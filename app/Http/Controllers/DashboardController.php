<?php

namespace App\Http\Controllers;

use App\Models\FlowOfGoods;
use App\Models\Goods;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Mendapatkan tanggal untuk query
        $satuBulanLalu = Carbon::now()->subMonth();
        $duaBulanLaluAwal = Carbon::now()->subMonths(2)->format('Y-m-d');
        $duaBulanLaluAkhir = $satuBulanLalu->format('Y-m-d');

        // ASSET BALANCE
        $totalAssetBalance = Goods::sum(column: DB::raw('price * total_stock'));

        // ASSET BALANCE Satu Bulan Terakhir
        $totalAssetBalanceSatuBulanTerakhir = Goods::where('created_at', '>=', $satuBulanLalu)
            ->sum(DB::raw('price * total_stock'));

        // ASSET BALANCE Dua Bulan Sebelumnya
        $totalAssetBalanceDuaBulanSebelumnya = Goods::whereBetween('created_at', [$duaBulanLaluAwal, $duaBulanLaluAkhir])
            ->sum(DB::raw('price * total_stock'));

        // Perhitungan Persentase Asset Balance
        $persentaseBalanceSatuBulanTerakhir = $this->calculatePercentage(
            $totalAssetBalanceSatuBulanTerakhir,
            $totalAssetBalanceDuaBulanSebelumnya,
            $totalAssetBalance
        );

        // ASSET INVENTARIS
        $totalAssetInventaris = Goods::sum('total_stock');
        $totalAssetInventarisSatuBulanTerakhir = Goods::where('created_at', '>=', $satuBulanLalu)->sum('total_stock');
        $totalAssetInventarisDuaBulanSebelumnya = Goods::whereBetween('created_at', [$duaBulanLaluAwal, $duaBulanLaluAkhir])->sum('total_stock');

        // Perhitungan Persentase Asset Inventaris
        $persentaseAssetInventaris = $this->calculatePercentage(
            $totalAssetInventarisSatuBulanTerakhir,
            $totalAssetInventarisDuaBulanSebelumnya,
            $totalAssetInventaris
        );

        // BARANG MASUK
        $totalBarangMasuk = FlowOfGoods::where('goods_flow_type_id', 1)
            ->orWhere('goods_flow_type_id', 3)
            ->orWhere('goods_flow_type_id', 4)
            ->orWhere('goods_flow_type_id', 8)
            ->sum('quantity');
        $totalBarangMasukSatuBulanTerakhir = FlowOfGoods::where('goods_flow_type_id', 1)->where('created_at', '>=', $satuBulanLalu)->sum('quantity');
        $totalBarangMasukDuaBulanSebelumnya = FlowOfGoods::where('goods_flow_type_id', 1)->whereBetween('created_at', [$duaBulanLaluAwal, $duaBulanLaluAkhir])->sum('quantity');

        // Perhitungan Persentase Barang Masuk
        $persentaseBarangMasuk = $this->calculatePercentage(
            $totalBarangMasukSatuBulanTerakhir,
            $totalBarangMasukDuaBulanSebelumnya,
            $totalBarangMasuk
        );

        // BARANG KELUAR
        $totalBarangKeluar = FlowOfGoods::where('goods_flow_type_id', 2)
            ->orWhere('goods_flow_type_id', 5)
            ->orWhere('goods_flow_type_id', 7)
            ->sum('quantity');
        $totalBarangKeluarSatuBulanTerakhir = FlowOfGoods::where('goods_flow_type_id', 2)->where('created_at', '>=', $satuBulanLalu)->sum('quantity');
        $totalBarangKeluarDuaBulanSebelumnya = FlowOfGoods::where('goods_flow_type_id', 2)->where('created_at', '>=', Carbon::now()->subMonths(6))->sum('quantity');

        // Perhitungan Persentase Barang Keluar
        $persentaseBarangKeluar = $this->calculatePercentage(
            $totalBarangKeluarSatuBulanTerakhir,
            $totalBarangKeluarDuaBulanSebelumnya,
            $totalBarangKeluar
        );

        // Define the time ranges
        $satuMingguTerakhir = Carbon::now()->subDays(7);
        $satuBulanTerakhir = Carbon::now()->subMonth();
        $enamBulanTerakhir = Carbon::now()->subMonths(6);
        $satuTahunTerakhir = Carbon::now()->subYear();

        // Define the goods flow types
        $goodsFlowTypes = [
            'terjual' => 4,
            'angkringan' => 2,
            'pribadi' => 3,
            'kantor' => 1,
        ];

        // Function to get total quantity for a specific outbound type and date range
        function getTotalQuantity($outboundTypeId, $startDate = null, $endDate = null)
        {
            $query = FlowOfGoods::where('goods_flow_type_id', 2)->where('outbound_type_id', $outboundTypeId);

            if ($startDate) {
                $query->where('created_at', '>=', $startDate);
            }
            if ($endDate) {
                $query->where('created_at', '<=', $endDate);
            }

            return $query->sum('quantity');
        }

        // BARANG KELUAR TERJUAL
        $totalBarangKeluarTerjualSatuMingguTerakhir = getTotalQuantity($goodsFlowTypes['terjual'], $satuMingguTerakhir);
        $totalBarangKeluarTerjualSatuBulanTerakhir = getTotalQuantity($goodsFlowTypes['terjual'], $satuBulanTerakhir);
        $totalBarangKeluarTerjualEnamBulanTerakhir = getTotalQuantity($goodsFlowTypes['terjual'], $enamBulanTerakhir);
        $totalBarangKeluarTerjualSatuTahunTerakhir = getTotalQuantity($goodsFlowTypes['terjual'], $satuTahunTerakhir);
        $totalBarangKeluarTerjual = getTotalQuantity($goodsFlowTypes['terjual']);

        // BARANG KELUAR ANGKRINGAN
        $totalBarangKeluarAngkringanSatuMingguTerakhir = getTotalQuantity($goodsFlowTypes['angkringan'], $satuMingguTerakhir);
        $totalBarangKeluarAngkringanSatuBulanTerakhir = getTotalQuantity($goodsFlowTypes['angkringan'], $satuBulanTerakhir);
        $totalBarangKeluarAngkringanEnamBulanTerakhir = getTotalQuantity($goodsFlowTypes['angkringan'], $enamBulanTerakhir);
        $totalBarangKeluarAngkringanSatuTahunTerakhir = getTotalQuantity($goodsFlowTypes['angkringan'], $satuTahunTerakhir);
        $totalBarangKeluarAngkringan = getTotalQuantity($goodsFlowTypes['angkringan']);

        // BARANG KELUAR PRIBADI
        $totalBarangKeluarPribadiSatuMingguTerakhir = getTotalQuantity($goodsFlowTypes['pribadi'], $satuMingguTerakhir);
        $totalBarangKeluarPribadiSatuBulanTerakhir = getTotalQuantity($goodsFlowTypes['pribadi'], $satuBulanTerakhir);
        $totalBarangKeluarPribadiEnamBulanTerakhir = getTotalQuantity($goodsFlowTypes['pribadi'], $enamBulanTerakhir);
        $totalBarangKeluarPribadiSatuTahunTerakhir = getTotalQuantity($goodsFlowTypes['pribadi'], $satuTahunTerakhir);
        $totalBarangKeluarPribadi = getTotalQuantity($goodsFlowTypes['pribadi']);

        // BARANG KELUAR KANTOR
        $totalBarangKeluarKantorSatuMingguTerakhir = getTotalQuantity($goodsFlowTypes['kantor'], $satuMingguTerakhir);
        $totalBarangKeluarKantorSatuBulanTerakhir = getTotalQuantity($goodsFlowTypes['kantor'], $satuBulanTerakhir);
        $totalBarangKeluarKantorEnamBulanTerakhir = getTotalQuantity($goodsFlowTypes['kantor'], $enamBulanTerakhir);
        $totalBarangKeluarKantorSatuTahunTerakhir = getTotalQuantity($goodsFlowTypes['kantor'], $satuTahunTerakhir);
        $totalBarangKeluarKantor = getTotalQuantity($goodsFlowTypes['kantor']);

        // Return ke view
        return view('dashboard.dashboard', compact(
            'totalAssetBalance',
            'persentaseBalanceSatuBulanTerakhir',
            'totalAssetInventaris',
            'persentaseAssetInventaris',
            'totalBarangMasuk',
            'persentaseBarangMasuk',
            'totalBarangKeluar',
            'persentaseBarangKeluar',
            'totalBarangKeluarTerjualSatuMingguTerakhir',
            'totalBarangKeluarTerjualSatuBulanTerakhir',
            'totalBarangKeluarTerjualEnamBulanTerakhir',
            'totalBarangKeluarTerjualSatuTahunTerakhir',
            'totalBarangKeluarTerjual',
            'totalBarangKeluarAngkringanSatuMingguTerakhir',
            'totalBarangKeluarAngkringanSatuBulanTerakhir',
            'totalBarangKeluarAngkringanEnamBulanTerakhir',
            'totalBarangKeluarAngkringanSatuTahunTerakhir',
            'totalBarangKeluarAngkringan',
            'totalBarangKeluarPribadiSatuMingguTerakhir',
            'totalBarangKeluarPribadiSatuBulanTerakhir',
            'totalBarangKeluarPribadiEnamBulanTerakhir',
            'totalBarangKeluarPribadiSatuTahunTerakhir',
            'totalBarangKeluarPribadi',
            'totalBarangKeluarKantorSatuMingguTerakhir',
            'totalBarangKeluarKantorSatuBulanTerakhir',
            'totalBarangKeluarKantorEnamBulanTerakhir',
            'totalBarangKeluarKantorSatuTahunTerakhir',
            'totalBarangKeluarKantor',
        ));
    }

    /**
     * Fungsi untuk menghitung persentase dengan validasi.
     */
    private function calculatePercentage($currentValue, $previousValue, $totalValue)
    {
        if ($previousValue != 0) {
            return (($currentValue - $previousValue) / $previousValue) * 100;
        }

        // Jika nilai sebelumnya 0, gunakan total value untuk menghindari division by zero
        return $totalValue != 0 ? ($currentValue / $totalValue) * 100 : 0;
    }
}
