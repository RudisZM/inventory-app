<?php

namespace App\Http\Controllers;

use App\Models\FlowOfGoods;
use App\Models\Placement;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class GoodsFlowController extends Controller
{
    public function index()
    {
        $flowOfGoods = FlowOfGoods::with('goods')->filter()->orderByDesc('id')->get();
        $placements = Placement::select('place_id')->distinct()->get();
        return view('goods_flow.index', compact('flowOfGoods', 'placements'));
    }
    public function update($id)
    {
        $flowOfGoods = FlowOfGoods::find($id);
        if (request()->input('new_description') != null) {
            $flowOfGoods->update([
                'description' => request()->input('new_description')
            ]);
            return redirect()->back()->with('success', 'Success update description.');
        }
        if (request()->input('new_created_at') != null) {
            $flowOfGoods->update([
                'created_at' => Carbon::createFromFormat('m/d/Y', request()->input('new_created_at'))
            ]);
            return redirect()->back()->with('success', 'Success update date.');
        }
    }
    public function destroy($id)
    {
        $flowOfGoods = FlowOfGoods::find($id);
        $getGoods = $flowOfGoods->goods;
        if ($flowOfGoods->goods_flow_type_id == 1) {
            $getGoods->update([
                'total_stock' => $getGoods->total_stock - $flowOfGoods->quantity,
            ]);
            if ($flowOfGoods->base_placement_id) {
                $getPlacement = Placement::find($flowOfGoods->base_placement_id);
                $getPlacement->update([
                    'stock' => $getPlacement->stock - $flowOfGoods->quantity,
                ]);
            } else {
                $getPlacement = Placement::where('goods_id', $getGoods->id)->first();
                $getPlacement->update([
                    'stock' => $getPlacement->stock - $flowOfGoods->quantity,
                ]);
            }
            $flowOfGoods->delete();
            return redirect()->back()->with('success', 'Success delete product.');
        } elseif ($flowOfGoods->goods_flow_type_id == 2) {
            $getGoods->update([
                'total_stock' => $getGoods->total_stock + $flowOfGoods->quantity,
            ]);
            if ($flowOfGoods->base_placement_id) {
                $getPlacement = Placement::find($flowOfGoods->base_placement_id);
                $getPlacement->update([
                    'stock' => $getPlacement->stock + $flowOfGoods->quantity,
                ]);
            } else {
                $getPlacement = Placement::where('goods_id', $getGoods->id)->first();
                $getPlacement->update([
                    'stock' => $getPlacement->stock + $flowOfGoods->quantity,
                ]);
            }
            $flowOfGoods->delete();
            return redirect()->back()->with('success', 'Success delete product.');
        }
        $getGoods->update([
            'total_stock' => $getGoods->total_stock - $flowOfGoods->quantity,
        ]);
        if ($flowOfGoods->base_placement_id) {
            $getPlacement = Placement::find($flowOfGoods->base_placement_id);
            $getPlacement->update([
                'stock' => $getPlacement->stock - $flowOfGoods->quantity,
            ]);
        } else {
            $getPlacement = Placement::where('goods_id', $getGoods->id)->first();
            $getPlacement->update([
                'stock' => $getPlacement->stock - $flowOfGoods->quantity,
            ]);
        }
        $flowOfGoods->delete();
        return redirect()->back()->with('success', 'Success delete product.');
    }
    public function exportExcel()
    {
        // Ambil parameter dari request untuk kolom header
        $headers = request()->except('_token'); // Ambil semua key request kecuali token CSRF

        // Pastikan ada header untuk diexport
        if (empty($headers)) {
            return back()->with('error', 'Tidak ada data untuk diekspor.');
        }

        // Buat Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan header ke file Excel
        $column = 'A'; // Mulai dari kolom A
        foreach (array_keys($headers) as $header) {
            $sheet->setCellValue($column . '1', ucfirst(str_replace('_', ' ', $header))); // Format header
            $column++; // Pindah ke kolom berikutnya
        }

        // Ambil data dari database (FlowOfGoods)
        $data = FlowOfGoods::with('goods')->filter()->orderByDesc('id')->get();

        // Menambahkan data ke dalam baris
        $row = 2; // Baris mulai setelah header
        foreach ($data as $flow) {
            $column = 'A'; // Mulai dari kolom A setiap baris

            // Looping berdasarkan header untuk mengisi data secara dinamis
            foreach (array_keys($headers) as $key) {
                if ($flow->goods_flow_type_id == 1) {
                    $tipe = 'masuk';
                } elseif ($flow->goods_flow_type_id == 2) {
                    $tipe = 'keluar';
                } else {
                    $tipe = $flow->goodsFlowType->name;
                }
                $value = match ($key) {
                    'tanggal' => $flow->created_at?->format('d-m-Y') ?? '', // Format tanggal
                    'nama_barang' => $flow->goods->name ?? '',
                    'deskripsi' => $flow->description ?? '',
                    'tipe_pengeluaran' => $flow->outboundType->name ?? '',
                    'tipe_transaksi' => $tipe ?? '',
                    'jumlah' => $flow->quantity ?? '',
                    'sisa_stok' => $flow->goods->total_stock ?? '',
                    'operator' => $flow->operator_name ?? '',
                    'base_inventory' => $flow->basePlacement->place->name ?? '',
                    'destination' => $flow->destinationPlacement->place->name ?? '',
                    default => '', // Default jika tidak ada case
                };

                // Set nilai pada sel untuk kolom dan baris yang sesuai
                $sheet->setCellValue($column . $row, $value);
                $column++; // Pindah ke kolom berikutnya
            }

            $row++; // Pindah ke baris berikutnya setelah setiap data flow
        }

        // Mengatur nama file
        $fileName = "data_alur_keluar_masuk_barang_" . now()->format('Ymd_His') . ".xlsx";

        // Membuat file Excel dan mengunduhnya
        $writer = new Xlsx($spreadsheet);
        $filePath = storage_path('app/public/' . $fileName);
        $writer->save($filePath);

        // Mengunduh file dan menghapus setelah pengiriman
        return Response::download($filePath)->deleteFileAfterSend(true);
    }
}
