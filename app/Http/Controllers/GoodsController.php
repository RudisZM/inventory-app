<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Tag;
use App\Models\Area;
use App\Models\Shap;
use App\Models\Asset;
use App\Models\Goods;
use App\Models\Place;
use App\Models\Placement;
use App\Models\Attachment;
use App\Models\FlowOfGoods;
use Illuminate\Support\Str;
use App\Models\OutboundType;
use Illuminate\Http\Request;
use App\Models\GoodsCategory;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Illuminate\Support\Facades\Response;
use Illuminate\Filesystem\Filesystem;

class GoodsController extends Controller
{
    public function index()
    {
        // Default paginator
        $paginator = request()->session()->get('page_paginator', 10);

        // Simpan paginator jika ada request baru
        if (request('page_paginator')) {
            $paginator = request('page_paginator');
            request()->session()->put('page_paginator', $paginator);
        }

        // Filter dan paginasi FlowOfGoods
        $flowOfGoods = FlowOfGoods::with(['goods:id,name,price']) // Pilih kolom yang diperlukan
            ->filter()
            ->orderByDesc('id')
            ->paginate($paginator);

        // Reset session placement jika tombol 'all' ditekan
        if (request('all')) {
            request()->session()->forget('placement');
        }

        // Optimasi query Goods
        $goods = Goods::with([
            'goodsCategory',
            'tag',
            'placement'
        ])
            ->search()
            ->filter()
            ->orderByDesc('created_at')
            ->paginate($paginator);

        // Optimasi kategori dan tempat
        $categories = GoodsCategory::select('id', 'name')->get(); // Ambil kolom yang diperlukan
        $places = Place::select('id', 'name')->get(); // Ambil kolom yang diperlukan
        $placements = Place::orderByDesc('created_at')->get(['id', 'name']); // Batasi kolom yang diambil

        // Return view dengan data
        return view('goods.index', compact('goods', 'categories', 'places', 'placements'));
    }
    public function goodsShow($id)
    {
        // Retrieve goods and related relationships (check if $goods is found)
        $goods = Goods::with(['goodsCategory', 'tag', 'placement'])->find($id);

        // Check if goods exist
        if (!$goods) {
            return redirect()->route('goods.index')->with('error', 'Goods not found.');
        }

        $places = Place::all();
        $placements = Placement::with(['place', 'area', 'rak', 'shap'])
            ->where('goods_id', $goods->id)
            ->orderByDesc('id')
            ->get();
        $attachments = Attachment::where('is_connect', false)
            ->orderByDesc('id')
            ->get();
        $categories = GoodsCategory::all();
        $assets = Asset::where('goods_id', $goods->id)
            ->orderByDesc('id')
            ->get();
        $flowOfGoods = FlowOfGoods::where('goods_id', $goods->id)
            ->orderByDesc('id')
            ->get();

        // Initialize total stocks
        $totalPlacementStock = 0;
        $totalAssetStock = Asset::where('goods_id', $goods->id)->sum('stock'); // Calculate total asset stock once

        // If there are placements, calculate totalPlacementStock
        foreach ($placements as $placement) {
            $totalPlacementStock += $placement->stock;
        }

        // Calculate excess stock
        $goodsExcessStock = $goods->total_stock - $totalPlacementStock - $totalAssetStock;

        // Get all outbound types
        $outboundTypes = OutboundType::all();

        // Return the view with necessary data
        return view('goods.show', compact('goods', 'places', 'placements', 'attachments', 'categories', 'assets', 'flowOfGoods', 'goodsExcessStock', 'outboundTypes'));
    }

    public function getArea($id)
    {
        $area = Area::where('place_id', $id)->get();
        return response()->json($area);
    }
    public function getRak($id)
    {
        $rak = Rak::where('area_id', $id)->get();
        return response()->json($rak);
    }
    public function getShap($id)
    {
        $shap = Shap::where('rak_id', $id)->get();
        return response()->json($shap);
    }
    // public function store(Request $request)
    // {
    //     $goods = new Goods();
    //     $goods->name = $request->input('name');
    //     $goods->slug = Str::slug($request->input('name'));
    //     $goods->code = $request->input('code');
    //     $goods->description = $request->input('description');
    //     $goods->price = $request->input('price');
    //     $goods->gross_weight = $request->input('gross_weight');
    //     $goods->gross_weight_unit = $request->input('gross_weight_unit');
    //     $goods->nett_weight = $request->input('nett_weight');
    //     $goods->nett_weight_unit = $request->input('nett_weight_unit');
    //     $goods->goods_category_id = $request->input('goods_category_id');
    //     $goods->total_stock = $request->input('stock');
    //     $goods->save();

    //     if ($request->file('goods_image')) {
    //         $image = $request->file('goods_image');
    //         $new_goods_name_img = rand() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('images'), $new_goods_name_img);
    //         $request->request->add(['image' => $new_goods_name_img]);
    //         $goods->image = $new_goods_name_img;
    //         $goods->save();
    //     } else {
    //         $goods->image = 'no-image.png';
    //         $goods->save();
    //     }

    //     if ($request->file('packaging_image')) {
    //         $image = $request->file('packaging_image');
    //         $new_goods_packaging_name_img = rand() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('images'), $new_goods_packaging_name_img);
    //         $request->request->add(['image' => $new_goods_packaging_name_img]);
    //         $goods->packaging_image = $new_goods_packaging_name_img;
    //         $goods->save();
    //     } else {
    //         $goods->packaging_image = 'no-image.png';
    //         $goods->save();
    //     }

    //     if ($request->input('place_id') !== 0) {
    //         $placement = new Placement();
    //         $placement->goods_id = $goods->id;
    //         $placement->place_id = $request->input('place_id');
    //         $placement->area_id = $request->input('area_id');
    //         $placement->rak_id = $request->input('rak_id');
    //         $placement->shap_id = $request->input('shap_id');
    //         $placement->stock = $request->input('stock');
    //         $placement->save();
    //     }

    //     if ($request->input('new_category')) {
    //         $category = new GoodsCategory();
    //         $category->name = $request->input('new_category');
    //         $category->save();

    //         $getCategory = GoodsCategory::where('name', $request->input('new_category'))->first();
    //         $getGoods = Goods::find($goods->id);
    //         $getGoods->goods_category_id = $getCategory->id;
    //         $getGoods->save();
    //     }

    //     if (request()->tags[0]) {
    //         foreach ($request->input('tags') as $tag) {
    //             $tags = new Tag();
    //             $tags->name = $tag;
    //             $tags->goods_id = $goods->id;
    //             $tags->save();
    //         }
    //     }
    //     $flowOfGoods = new flowOfGoods();
    //     $flowOfGoods->goods_id = $goods->id;
    //     $flowOfGoods->goods_flow_type_id = 1;
    //     $flowOfGoods->quantity = $request->input('stock');
    //     $flowOfGoods->save();

    //     return redirect()->back()->with('success', 'Berhasil menambah product.');
    // }

    public function store(Request $request)
    {
        // Validasi hanya untuk kolom 'name'
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Buat instance baru untuk barang (goods)
        $goods = new Goods();
        $goods->name = $request->input('name');
        $goods->slug = Str::slug($request->input('name'));
        $goods->code = $request->input('code', null); // Default null jika tidak diisi
        $goods->description = $request->input('description', null); // Default null jika tidak diisi
        $goods->price = $request->input('price', 0); // Default 0 untuk harga
        $goods->gross_weight = $request->input('gross_weight', 0);
        $goods->gross_weight_unit = $request->input('gross_weight_unit', 'kg'); // Default 'kg'
        $goods->nett_weight = $request->input('nett_weight', 0);
        $goods->nett_weight_unit = $request->input('nett_weight_unit', 'kg'); // Default 'kg'
        $goods->goods_category_id = $request->input('goods_category_id', null); // Default null
        $goods->total_stock = $request->input('stock', 0); // Default 0 jika tidak diisi
        $goods->save();

        // Simpan gambar barang jika ada
        if ($request->hasFile('goods_image')) {
            $image = $request->file('goods_image');
            $newGoodsImageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $newGoodsImageName);
            $goods->image = $newGoodsImageName;
        } else {
            $goods->image = 'no-image.png'; // Default jika tidak ada gambar
        }
        $goods->save();

        // Simpan gambar kemasan jika ada
        if ($request->hasFile('packaging_image')) {
            $image = $request->file('packaging_image');
            $newPackagingImageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $newPackagingImageName);
            $goods->packaging_image = $newPackagingImageName;
        } else {
            $goods->packaging_image = 'no-image.png'; // Default jika tidak ada gambar
        }
        $goods->save();

        // Simpan lokasi barang jika ada `place_id`
        if ($request->filled('place_id') && $request->input('place_id') != 0) {
            Placement::create([
                'goods_id' => $goods->id,
                'place_id' => $request->input('place_id'),
                'area_id' => $request->input('area_id'),
                'rak_id' => $request->input('rak_id'),
                'shap_id' => $request->input('shap_id'),
                'stock' => $request->input('stock', 0),
            ]);
        } else {
            if (Place::where('name', 'no placement')->get() == null) {
                Place::create([
                    'name' => 'no placement'
                ]);
            }
            Placement::create([
                'goods_id' => $goods->id,
                'place_id' => Place::where('name', 'no placement')->first()->id,
            ]);
        }

        // Tambahkan kategori baru jika ada
        if ($request->filled('new_category')) {
            $category = GoodsCategory::create([
                'name' => $request->input('new_category'),
            ]);
            $goods->goods_category_id = $category->id;
            $goods->save();
        }

        // Tambahkan tag jika ada
        if (request()->tags[0]) {
            foreach ($request->input('tags') as $tag) {
                Tag::create([
                    'name' => $tag,
                    'goods_id' => $goods->id,
                ]);
            }
        }

        // Simpan data flow barang
        FlowOfGoods::create([
            'goods_id' => $goods->id,
            'goods_flow_type_id' => 1,
            'quantity' => $request->input('stock', 0),
        ]);

        return redirect()->back()->with('success', 'Berhasil memasukkan barang.');
    }
    public function addNewLocation($id)
    {
        $Placement = new Placement();
        dd(request()->all());
        $Placement->goods_id = $id;
        $Placement->place_id = request()->input('place_id');
        $Placement->area_id = request()->input('area_id');
        $Placement->rak_id = request()->input('rak_id');
        $Placement->shap_id = request()->input('shap_id');
        $Placement->save();

        $getStockGoods = Goods::find($id)->total_stock;
        $restTotalStockGoods = $getStockGoods + $Placement->stock;
        Goods::find($id)->update([
            'total_stock' => $restTotalStockGoods,
            'import_placement' => null,
        ]);

        return redirect()->back()->with('success', 'Success add new location product.');
    }
    public function updateLocation($id)
    {
        $getPlacement = Placement::find($id);
        $cekPlacement = Placement::where('place_id', request()->input('place_id'))->where('goods_id', '!=', 0)->first();
        if ($cekPlacement) {
            if (
                $cekPlacement->place_id == request()->input('place_id') &&
                $cekPlacement->area_id == request()->input('area_id') &&
                $cekPlacement->rak_id == request()->input('rak_id') &&
                $cekPlacement->shap_id == request()->input('shap_id')
            ) {
                $cekPlacement->stock = $cekPlacement->stock + $getPlacement->stock;
                $cekPlacement->update();
                $getPlacement->delete();
            }
        }

        if (request()->input('place_id') != 0) {
            $placement = new Placement();
            $placement->goods_id = 0;
            $placement->place_id = $getPlacement->place_id;
            $placement->area_id = $getPlacement->area_id;
            $placement->rak_id = $getPlacement->rak_id;
            $placement->shap_id = $getPlacement->shap_id;
            $placement->stock = $getPlacement->stock;
            $placement->save();

            $getPlacement->update([
                'place_id' => request()->input('place_id'),
            ]);

            $flowOfGoods = new FlowOfGoods();
            $flowOfGoods->goods_id = $getPlacement->goods_id;
            $flowOfGoods->goods_flow_type_id = 3;
            $flowOfGoods->base_placement_id = $placement->id;
            $flowOfGoods->destination_placement_id = $getPlacement->id;
            $flowOfGoods->quantity = 0;
            $flowOfGoods->save();
        }
        if (request()->input('area_id') != 0) {
            $getPlacement->update([
                'area_id' => request()->input('area_id'),
            ]);
        }
        if (request()->input('rak_id') != 0) {
            $getPlacement->update([
                'rak_id' => request()->input('rak_id'),
            ]);
        }
        if (request()->input('shap_id') != 0) {
            $getPlacement->update([
                'shap_id' => request()->input('shap_id'),
            ]);
        }

        Goods::find($getPlacement->goods_id)->update([
            'import_placement' => null,
        ]);

        if (request()->input('place_id') !== 0 || request()->input('area_id') !== 0 || request()->input('rak_id') !== 0 || request()->input('shap_id') !== 0) {
            return redirect()->back()->with('success', 'Success update location product.');
        } else {
            return redirect()->back()->with('failed', 'Failed update location product.');
        }
    }
    public function updateLocationAsset($id)
    {
        $getAsset = Asset::find($id);
        $cekAssetPlacement = Asset::where('place_id', request()->input('place_id'))->first();

        if ($cekAssetPlacement) {
            if (
                $cekAssetPlacement->place_id == request()->input('place_id') &&
                $cekAssetPlacement->area_id == request()->input('area_id') &&
                $cekAssetPlacement->rak_id == request()->input('rak_id') &&
                $cekAssetPlacement->shap_id == request()->input('shap_id')
            ) {
                $cekAssetPlacement->stock = $cekAssetPlacement->stock + $getAsset->stock;
                $cekAssetPlacement->update();
                $getAsset->delete();
            }
        }
        if (request()->input('place_id') !== 0) {
            $getAsset->update([
                'place_id' => request()->input('place_id'),
            ]);
        }
        if (request()->input('area_id') !== 0) {
            $getAsset->update([
                'area_id' => request()->input('area_id'),
            ]);
        }
        if (request()->input('rak_id') !== 0) {
            $getAsset->update([
                'rak_id' => request()->input('rak_id'),
            ]);
        }
        if (request()->input('shap_id') !== 0) {
            $getAsset->update([
                'shap_id' => request()->input('shap_id'),
            ]);
        }
        return redirect()->back()->with('success', 'Success update location product.');
    }
    public function updateImage(Request $request, $id)
    {
        $getGoods = Goods::find($id);
        $filesystem = new Filesystem;

        if ($request->input('type') == 'goods') {
            $filePath = public_path('images/' . $getGoods->image);

            if ($filesystem->exists($filePath)) {
                if ($getGoods->image != 'no-image.png') {
                    $filesystem->delete($filePath);
                }
            }

            if ($request->file('update_image')) {
                $image = $request->file('update_image');
                $new_name_img = rand() . '.' . $image->getClientOriginalExtension();

                // Kompresi gambar menggunakan GD
                $this->compressImage($image->getRealPath(), public_path('images/' . $new_name_img), 75);

                $request->request->add(['image' => $new_name_img]);
            } else {
                $new_name_img = 'no-image.png';
            }

            $getGoods->image = $new_name_img;
            $getGoods->is_imported = false;
            $getGoods->update();

            return redirect()->back()->with('success', 'Success update image product.');
        } elseif ($request->input('type') == 'packaging') {
            $filePath = public_path('images/' . $getGoods->packaging_image);

            if ($filesystem->exists($filePath)) {
                if ($getGoods->packaging_image != 'no-image.png') {
                    $filesystem->delete($filePath);
                }
            }

            if ($request->file('update_image')) {
                $image = $request->file('update_image');
                $new_name_img = rand() . '.' . $image->getClientOriginalExtension();

                // Kompresi gambar menggunakan GD
                $this->compressImage($image->getRealPath(), public_path('images/' . $new_name_img), 75);

                $request->request->add(['image' => $new_name_img]);
            } else {
                $new_name_img = 'no-image.png';
            }

            $getGoods->packaging_image = $new_name_img;
            $getGoods->is_imported = false;
            $getGoods->update();

            return redirect()->back()->with('success', 'Success update image product.');
        }
        if ($request->input('type') == 'goods_delete') {
            $filePath = public_path('images/' . $getGoods->image);

            if ($filesystem->exists($filePath)) {
                if ($getGoods->image != 'no-image.png') {
                    $filesystem->delete($filePath);
                }
            }
            $getGoods->image = 'no-image.png';
            $getGoods->is_imported = false;
            $getGoods->update();
            return redirect()->back()->with('success', 'Success update image product.');
        } elseif ($request->input('type') == 'packaging_delete') {
            $filePath = public_path('images/' . $getGoods->packaging_image);

            if ($filesystem->exists($filePath)) {
                if ($getGoods->packaging_image != 'no-image.png') {
                    $filesystem->delete($filePath);
                }
            }
            $getGoods->packaging_image = 'no-image.png';
            $getGoods->is_imported = false;
            $getGoods->update();
            return redirect()->back()->with('success', 'Success update image product.');
        }
        return redirect()->back()->with('failed', 'Failed update image product.');
    }

    /**
     * Fungsi untuk mengompres gambar menggunakan GD Library
     */
    private function compressImage($sourcePath, $destinationPath, $quality)
    {
        // Dapatkan tipe gambar
        $info = getimagesize($sourcePath);
        $mime = $info['mime'];

        // Load gambar berdasarkan tipe
        switch ($mime) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($sourcePath);
                break;
            case 'image/png':
                $image = imagecreatefrompng($sourcePath);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($sourcePath);
                break;
            default:
                throw new \Exception('Unsupported image type.');
        }

        // Simpan gambar ke destinasi dengan kualitas tertentu
        if ($mime == 'image/png') {
            // Kompres untuk PNG (kualitas 0-9)
            $compression = (int) round((100 - $quality) / 10);
            imagepng($image, $destinationPath, $compression);
        } else {
            // Kompres untuk JPEG dan lainnya (kualitas 0-100)
            imagejpeg($image, $destinationPath, $quality);
        }

        // Bersihkan resource GD
        imagedestroy($image);
    }
    public function updateLocationImage(Request $request, $id)
    {
        $getPlacement = Placement::find($id);
        $filesystem = new Filesystem;

        $filePath = public_path('images/' . $getPlacement->image);

        if ($filesystem->exists($filePath)) {
            if ($getPlacement->image != 'no-image.png') {
                $filesystem->delete($filePath);
            }
        }

        if (request()->file('update_image')) {
            $image = $request->file('update_image');
            $new_name_img = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name_img);
            $request->request->add(['image' => $new_name_img]);
        } else {
            $new_name_img = 'no-image.png';
        }
        $getPlacement->image = $new_name_img;
        $getPlacement->save();
        return redirect()->back()->with('success', 'Success update image product.');
    }
    public function updateLocationStock($id)
    {
        $getPlacement = Placement::find($id);
        if (request()->input('new_stock') != 0 && request()->input('increase_stock') == 0) {

            $getGoods = Goods::find($getPlacement->goods_id);
            $getTotalStockProduct = $getGoods->total_stock - $getPlacement->stock + request()->input('new_stock');
            $getGoods->update([
                'total_stock' => $getTotalStockProduct,
            ]);
            $getPlacement->update([
                'stock' => request()->input('new_stock'),
            ]);

            return redirect()->back()->with('success', 'Success update stock barang.');
        }
        if (request()->input('increase_stock') != 0 && request()->input('new_stock') == 0) {
            $getPlacementStock = $getPlacement->stock;
            $getPlacementStock = $getPlacementStock + request()->input('increase_stock');
            $getPlacement->update([
                'stock' => $getPlacementStock,
            ]);
            $getTotalStockProduct = Goods::find($getPlacement->goods_id)->total_stock;
            $getTotalStockProduct = $getTotalStockProduct + request()->input('increase_stock');
            Goods::find($getPlacement->goods_id)->update([
                'total_stock' => $getTotalStockProduct,
            ]);

            return redirect()->back()->with('success', 'Success update stock barang.');
        }
        if (request()->input('new_stock') == 0 && request()->input('increase_stock') == 0) {
            $getTotalStockProduct = Goods::find($getPlacement->goods_id)->total_stock;
            $getTotalStockProduct = $getTotalStockProduct - $getPlacement->stock;;
            Goods::find($getPlacement->goods_id)->update([
                'total_stock' => $getTotalStockProduct,
            ]);
            $getPlacement->update([
                'stock' => 0,
            ]);

            return redirect()->back()->with('success', 'Success update stock barang.');
        }
    }
    public function updateStockAsset($id)
    {
        $getPlacement = Placement::find(request()->input('placement_id'));
        if ($getPlacement == null) {
            return redirect()->back()->with('error', 'Jangan lupa pilih base inventory terlebih dahulu.');
        }
        if (request()->input('increase_stock') > $getPlacement->stock) {
            return redirect()->back()->with('error', 'Jumlah stock yang ingin ditambahkan melebihi stock yang ada.');
        }
        $getAsset = Asset::find($id);
        $getAsset->stock = $getAsset->stock + request()->input('increase_stock');
        $getAsset->update();
        $getPlacement->update([
            'stock' => $getPlacement->stock - request()->input('increase_stock'),
        ]);
        return redirect()->back()->with('success', 'Success update stock asset.');
    }
    public function updateData($id)
    {
        $getGoods = Goods::find($id);
        if (request()->input('new_name')) {
            $getGoods->name = request()->input('new_name');
            $getGoods->save();
        }
        if (request()->input('new_description')) {
            $getGoods->description = request()->input('new_description');
            $getGoods->save();
        }
        if (request()->input('new_price')) {
            $getGoods->price = request()->input('new_price');
            $getGoods->save();
        }
        if (request()->input('new_category_id')) {
            $getGoods->update([
                'goods_category_id' => request()->input('new_category_id'),
            ]);
        }
        if (request()->input('new_category')) {
            $goodsCategory = new GoodsCategory();
            $goodsCategory->name = request()->input('new_category');
            $goodsCategory->save();
            $getGoods->update([
                'goods_category_id' => $goodsCategory->id,
            ]);
        }
        if (request()->input('new_tag')) {
            $tag = new Tag();
            $tag->name = request()->input('new_tag');
            $tag->goods_id = $getGoods->id;
            $tag->save();
            $getGoods->update([
                'tag_id' => $tag->id,
            ]);
        }
        if (
            request()->input('stock') &&
            request()->input('placement_id') &&
            request()->input('stock') <= request()->input('goods_excess_stock')
        ) {
            $getPlacement = Placement::find(request()->input('placement_id'));
            $calcStock = $getPlacement->stock + request()->input('stock');
            $getPlacement->update([
                'stock' => $calcStock
            ]);
        } elseif (
            request()->input('stock') > request()->input('goods_excess_stock')
        ) {
            return redirect()->back()->with('error', 'Gagal mengupdate. Harap perhatikan inputan Anda!');
        }
        if (request()->input('new_gross_weight')) {
            $getGoods->update([
                'gross_weight' => request()->input('new_gross_weight'),
                'gross_weight_unit' => request()->input('new_gross_weight_unit'),
            ]);
        }
        if (request()->input('new_nett_weight')) {
            $getGoods->update([
                'nett_weight' => request()->input('new_nett_weight'),
                'nett_weight_unit' => request()->input('new_nett_weight_unit'),
            ]);
        }
        return redirect()->back()->with('success', 'Success update data product.');
    }
    public function removeTag()
    {
        $tag = Tag::find(request()->input('tag_id'));
        $tag->delete();
        return redirect()->back()->with('success', 'Success remove tag product.');
    }
    public function createOutbound($id)
    {
        if (request()->input('quantity') == null) {
            return redirect()->back()->with('error', 'Harap perhatikan inputan Anda!');
        }
        if (request()->input('placement_id') == null) {
            return redirect()->back()->with('error', 'Base inventory belum dipilih!');
        }
        if (request()->input('quantity') > Placement::find(request()->input('placement_id'))->stock) {
            return redirect()->back()->with('error', 'Jumlah stock yang ingin di keluarkan melebihi stock yang ada.');
        }
        if (request()->input('outbound_type_id') == 0) {
            return redirect()->back()->with('error', 'Jangan lupa pilih type jenis pengeluaran terlebih dahulu.');
        }
        if (request()->input('created_at') == null) {
            return redirect()->back()->with('error', 'Anda harus memilih tanggal terlebih dahulu!');
        }
        $outbound = new FlowOfGoods();
        $outbound->goods_id = Goods::find($id)->id;
        $outbound->goods_flow_type_id = 2;
        $outbound->base_placement_id = request()->input('placement_id');
        $outbound->quantity = request()->input('quantity');
        $outbound->outbound_type_id = request()->input('outbound_type_id');
        if (request()->input('is_barang_kembali')) {
            $outbound->goods_flow_type_id = 7;
            $outbound->is_return = true;
            $outbound->return_date =  Carbon::createFromFormat('m/d/Y', request()->input('return_date'));
            if (request()->file('file_image')) {
                $image = request()->file('file_image');
                $new_name_img = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $new_name_img);
                $outbound->image = $new_name_img;
            }
        }
        $createdAt = request()->input('created_at');
        $outbound->created_at = Carbon::createFromFormat('m/d/Y', $createdAt)->format('Y-m-d');
        $outbound->operator_name = request()->input('operator_name');
        $outbound->description = request()->input('description');
        $outbound->save();

        $getPlacement = Placement::find(request()->input('placement_id'));
        $placementStock = $getPlacement->stock - request()->input('quantity');
        $getPlacement->update([
            'stock' => $placementStock,
        ]);

        $getGoods = Goods::find($id);
        $getGoodsStock = $getGoods->total_stock - request()->input('quantity');
        $getGoods->update([
            'total_stock' => $getGoodsStock,
        ]);

        return redirect()->back()->with('success', 'Success create oubound report.');
    }
    public function createInbound($id)
    {
        $attachment = Attachment::find(request()->input('attachment_id'));
        $time = Carbon::now()->format('Y-m-d');

        if (request()->input('is_asset') == 1) {
            if (request()->file('image')) {
                $image = request()->file('image');
                $new_name_img = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $new_name_img);
                request()->request->add(['image' => $new_name_img]);
            } else {
                $new_name_img = null;
            }
            $outbound = new FlowOfGoods();
            $outbound->goods_id = Goods::find($id)->id;
            $outbound->goods_flow_type_id = 1;
            $outbound->is_asset = true;
            $outbound->destination_placement_id = request()->input('placement_id');
            $outbound->quantity = request()->input('quantity');
            $outbound->description = request()->input('description');
            $outbound->created_at = Carbon::parse($time)->format('Y-m-d');
            $outbound->save();

            $getGoods = Goods::find($id);
            $getGoodsStock = $getGoods->total_stock + request()->input('quantity');
            $getGoods->update([
                'total_stock' => $getGoodsStock,
            ]);

            $asset = new Asset();
            $asset->goods_id = $id;
            $asset->description = request()->input('description');
            $asset->image = $new_name_img;
            $asset->place_id = request()->input('place_id');
            $asset->area_id = request()->input('area_id');
            $asset->rak_id = request()->input('rak_id');
            $asset->shap_id = request()->input('shap_id');
            $asset->stock = request()->input('quantity');
            $asset->created_at = Carbon::parse($time)->format('Y-m-d');
            $asset->save();

            if ($attachment) {
                $attachment->update([
                    'is_connected' => true
                ]);
            }
            return redirect()->back()->with('success', 'Success create oubound report.');
        }
        if ($attachment != null) {
            $outbound = new FlowOfGoods();
            $outbound->goods_id = Goods::find($id)->id;
            $outbound->goods_flow_type_id = 1;
            if (request()->input('quantity')) {
                $outbound->quantity = request()->input('quantity');
            } elseif ($attachment->quantity) {
                $outbound->quantity = $attachment->quantity;
            } else {
                $outbound->quantity = 0;
            }
            $outbound->created_at = Carbon::parse($time)->format('Y-m-d');
            $outbound->description = request()->input('description');
            $outbound->save();

            $getGoods = Goods::find($id);
            ($attachment->quantity) ? $getGoodsStock = $getGoods->total_stock + $attachment->quantity : $getGoodsStock = $getGoods->total_stock + request()->input('quantity');
            $getGoods->update([
                'total_stock' => $getGoodsStock,
            ]);
            $getPlacement = Placement::where('place_id', request()->input('place_id'))->first();
            if ($getPlacement) {
                if (request()->input('place_id') == $getPlacement->place_id && request()->input('area_id') == $getPlacement->area_id && request()->input('rak_id') == $getPlacement->rak_id && request()->input('shap_id') == $getPlacement->shap_id) {
                    $placementStock = $getPlacement->stock + request()->input('quantity');
                    $getPlacement->update([
                        'stock' => $placementStock,
                    ]);
                }
            } else {
                $placement = new Placement();
                $placement->goods_id = $id;
                $placement->place_id = request()->input('place_id');
                $placement->area_id = request()->input('area_id');
                $placement->rak_id = request()->input('rak_id');
                $placement->shap_id = request()->input('shap_id');
                $placement->stock = request()->input('quantity');
                $placement->save();
            }
            $attachment->update([
                'is_connected' => true
            ]);
            return redirect()->back()->with('success', 'Success create oubound report.');
        } else {
            if (request()->file('image')) {
                $image = request()->file('image');
                $new_name_img = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $new_name_img);
                request()->request->add(['image' => $new_name_img]);
            } else {
                $new_name_img = null;
            }
            $getGoods = Goods::find($id);
            $getGoodsStock = $getGoods->total_stock + request()->input('quantity');
            $getGoods->update([
                'total_stock' => $getGoodsStock,
            ]);
            $getPlacement = Placement::where('place_id', request()->input('placement_id'))->first();
            $getPlacement->update([
                'stock' => $getPlacement->stock + request()->input('quantity'),
            ]);
            $outbound = new FlowOfGoods();
            $outbound->goods_id = $id;
            $outbound->goods_flow_type_id = 1;
            $outbound->quantity = request()->input('quantity');
            $outbound->description = request()->input('description');
            $outbound->created_at = Carbon::parse($time)->format('Y-m-d');
            $outbound->save();
            return redirect()->back()->with('success', 'Success create inbound report.');
        }
    }
    public function splitStock($id)
    {
        $getPlacement = Placement::find(request()->input('placement_id'));
        if (request()->input('quantity') > $getPlacement->stock) {
            return redirect()->back()->with('error', 'Stock not enough.');
        }
        $placementStock = $getPlacement->stock - request()->input('stock');
        $getPlacement->update([
            'stock' => $placementStock,
        ]);
        $Placement = new Placement();
        $Placement->goods_id = $id;
        $Placement->place_id = request()->input('place_id');
        $Placement->area_id = request()->input('area_id');
        $Placement->rak_id = request()->input('rak_id');
        $Placement->shap_id = request()->input('shap_id');
        $Placement->stock = request()->input('stock');
        $Placement->save();

        $flowOfGoods = new FlowOfGoods();
        $flowOfGoods->goods_id = $id;
        $flowOfGoods->goods_flow_type_id = 4;
        $flowOfGoods->base_placement_id = request()->input('placement_id');
        $flowOfGoods->destination_placement_id = $Placement->id;
        $flowOfGoods->quantity = 0;
        $flowOfGoods->description = request()->input('description');
        $flowOfGoods->save();

        return redirect()->back()->with('success', 'Success split stock product.');
    }
    public function createAsset($id)
    {
        $time = Carbon::now()->format('Y-m-d');
        $getPlacement = Placement::find(request()->input('placement_id'));
        if ($getPlacement == null) {
            return redirect()->back()->with('error', 'Jangan lupa pilih placement terlebih dahulu.');
        }
        if (request()->input('quantity') > $getPlacement->stock) {
            return redirect()->back()->with('error', 'Stock not enough.');
        }

        $restPlacementStock = $getPlacement->stock - request()->input('quantity');
        $getPlacement->update([
            'stock' => $restPlacementStock,
        ]);
        if (request()->input('quantity') > request()->input('rest_quantity')) {
            $getGoods = Goods::find($getPlacement->goods_id);
            $getTotalStockProduct = $getGoods->total_stock - (request()->input('quantity') - request()->input('rest_quantity'));
            $getGoods->update([
                'total_stock' => $getTotalStockProduct,
            ]);
        }

        if (request()->input('quantity') > request()->input('rest_quantity')) {
            $flowOfGoods = new FlowOfGoods();
            $flowOfGoods->goods_id = $id;
            $flowOfGoods->goods_flow_type_id = 2;
            $flowOfGoods->base_placement_id = request()->input('placement_id');
            $flowOfGoods->quantity = request()->input('quantity') - request()->input('rest_quantity');
            $flowOfGoods->description = request()->input('description');
            $flowOfGoods->created_at = Carbon::parse($time)->format('Y-m-d');
            $flowOfGoods->save();
        }

        $asset = new Asset();
        $asset->goods_id = $id;
        $asset->description = request()->input('description');
        $asset->image = request()->input('image');
        $asset->place_id = request()->input('place_id');
        $asset->area_id = request()->input('area_id');
        $asset->rak_id = request()->input('rak_id');
        $asset->shap_id = request()->input('shap_id');
        if (request()->input('rest_quantity') > 0) {
            $asset->stock = request()->input('rest_quantity');
        } else {
            $asset->stock = request()->input('quantity');
        }
        $asset->created_at = Carbon::parse($time)->format('Y-m-d');
        $asset->save();

        $flowOfGoods = new FlowOfGoods();
        $flowOfGoods->goods_id = $id;
        $flowOfGoods->goods_flow_type_id = 5;
        $flowOfGoods->base_placement_id = request()->input('placement_id');
        $flowOfGoods->quantity = request()->input('quantity') - request()->input('rest_quantity');
        $flowOfGoods->description = request()->input('description');
        $flowOfGoods->created_at = Carbon::parse($time)->format('Y-m-d');
        $flowOfGoods->save();
        return redirect()->back()->with('success', 'Success create asset.');
    }
    public function importCsv(Request $request)
    {
        $request->validate([
            'file_csv' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('file_csv');
        $handle = fopen($file, 'r');
        $placementNames = [];
        $placementId = [];
        $header = fgetcsv($handle); // Ambil header (opsional)

        while (($row = fgetcsv($handle)) !== FALSE) {
            $goods = new Goods();
            $url = $row[1];
            if ($url == 'null') {
                $goods->image = 'null';
            } else {
                $filteredUrl = strstr($url, '/files/');
                $filteredUrl = str_replace('/files/', '', $filteredUrl);
                $goods->image = $filteredUrl;
            }
            $goods->name = $row[2];
            $goods->slug = Str::slug($row[2]);
            $goods->price = $row[3];
            $goods->import_placement = $row[4];
            $goods->total_stock = $row[5];
            $goods->is_imported = true;
            $goods->save();
            array_push($placementNames, $row[4]);

            $placement = new Placement();
            $placement->goods_id = $goods->id;
            $placement->stock = $row[5];
            $placement->save();
            array_push($placementId, $placement->id);

            $flowOfGoods = new FlowOfGoods();
            $flowOfGoods->goods_id = $goods->id;
            $flowOfGoods->goods_flow_type_id = 1;
            $flowOfGoods->quantity = $row[5];
            $flowOfGoods->description = 'Diimport dari CSV';
            $flowOfGoods->destination_placement_id = $placement->id;
            $time = Carbon::now()->format('Y-m-d');
            $flowOfGoods->created_at = Carbon::parse($time)->format('Y-m-d');
            $flowOfGoods->save();
        }

        $placementNames = array_unique(array_filter($placementNames));
        foreach ($placementNames as $key => $value) {
            $cekPlaceExist = Place::where('name', $value)->first();
            if ($cekPlaceExist == null) {
                $place = new Place();
                $place->name = $value;
                $place->save();
            }
        }
        foreach ($placementId as $key => $value) {
            $placement = Placement::find($value);
            $getGoods = Goods::find($placement->goods_id);
            $getPlace = Place::where('name', $getGoods->import_placement)->first();
            if ($getPlace != '') {
                $placement->place_id = $getPlace->id;
                $placement->update();
            }
        }
        fclose($handle);

        return redirect()->back()->with('success', 'Data imported successfully!');
    }
    public function exportExcel()
    {
        // Buat Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header Excel
        $headers = [
            'Tanggal',
            'No',
            'Item Product Inventaris Asset',
            'Jumlah Item',
            'Harga Satuan',
            'Harga Total',
            'Kondisi Asset',
            '% Penyusutan',
            'Harga Update',
            'Harga Total',
            'Paraf Checker',
            'Paraf Admin',
            'Paraf Supervisor',
            'Paraf BDM',
            'Keterangan',
            // 'Gambar',  // Kolom untuk gambar
        ];

        // Menambahkan header ke file Excel
        $column = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($column . '1', $header);
            $column++;
        }

        // Ambil data dari database
        $goods = Goods::with('placement')->filter()->orderByDesc('id')->get();
        $row = 2; // Baris mulai setelah header

        foreach ($goods as $index => $data) {
            $sheet->setCellValue('A' . $row, $data->created_at?->format('d-m-Y') ?? ''); // Format tanggal
            $sheet->setCellValue('B' . $row, $index + 1); // Nomor urut
            $sheet->setCellValue('C' . $row, $data->name ?? ''); // Nama barang
            $sheet->setCellValue('D' . $row, $data->total_stock ?? 0); // Jumlah item
            $sheet->setCellValue('E' . $row, $data->price ?? 0); // Harga satuan
            $sheet->setCellValue('F' . $row, ($data->total_stock ?? 0) * ($data->price ?? 0)); // Harga total
            $sheet->setCellValue('G' . $row, $data->condition ?? ''); // Kondisi asset
            $sheet->setCellValue('H' . $row, $data->depreciation ?? 0); // Penyusutan
            $sheet->setCellValue('I' . $row, $data->updated_price ?? 0); // Harga update
            $sheet->setCellValue('J' . $row, ($data->updated_price ?? 0) * ($data->total_stock ?? 0)); // Harga total baru
            $sheet->setCellValue('K' . $row, ''); // Paraf checker
            $sheet->setCellValue('L' . $row, ''); // Paraf admin
            $sheet->setCellValue('M' . $row, ''); // Paraf supervisor
            $sheet->setCellValue('N' . $row, ''); // Paraf BDM
            $sheet->setCellValue('O' . $row, $data->notes ?? ''); // Keterangan

            // Menambahkan gambar ke dalam kolom 'Gambar' jika ada
            // if ($data->image) {  // Pastikan $data->image_path berisi path gambar yang valid
            //     $drawing = new Drawing();
            //     $drawing->setName('Product Image');
            //     $drawing->setDescription('Image for ' . $data->name);
            //     $drawing->setPath(public_path('images/' . $data->image));  // Path gambar
            //     $drawing->setHeight(50);  // Mengatur tinggi gambar
            //     $drawing->setWidth(50);   // Mengatur lebar gambar
            //     $drawing->setCoordinates('P' . $row);  // Menyisipkan gambar pada kolom P
            //     $drawing->setWorksheet($sheet);  // Menambahkan gambar ke worksheet
            // }

            $row++;
        }

        // Mengatur nama file
        $fileName = "data_barang_" . now()->format('Ymd_His') . ".xlsx";

        // Membuat file Excel dan menyimpannya
        $writer = new Xlsx($spreadsheet);
        $filePath = storage_path('app/public/' . $fileName);
        $writer->save($filePath);

        // Mengunduh file dan menghapus setelah pengiriman
        return Response::download($filePath)->deleteFileAfterSend(true);
    }
    public function destroy($id)
    {
        $getGoods = Goods::find($id);
        $getGoods->delete();

        $filesystem = new Filesystem;

        $fileGoodsPath = public_path('images/' . $getGoods->image);
        $filePackagingPath = public_path('images/' . $getGoods->packaging_image);

        if ($filesystem->exists($fileGoodsPath) || $filesystem->exists($filePackagingPath)) {
            if ($getGoods->image != 'no-image.png') {
                $filesystem->delete($fileGoodsPath);
            }
            if ($getGoods->packaging_image != 'no-image.png') {
                $filesystem->delete($filePackagingPath);
            }
        }
        return redirect()->back()->with('success', 'Success delete product.');
    }
    public function massDestroy(Request $request)
    {
        foreach ($request->input('dynamicInput') as $id) {
            $getGoods = Goods::find($id);
            if ($getGoods->image != 'no-image.png' || $getGoods->is_imported == false) {
                $filesystem = new Filesystem;
                $fileGoodsPath = public_path('images/' . $getGoods->image);
                $filePackagingPath = public_path('images/' . $getGoods->packaging_image);
                if ($filesystem->exists($fileGoodsPath)) {
                    $filesystem->delete($fileGoodsPath);
                }
                if ($filesystem->exists($filePackagingPath)) {
                    $filesystem->delete($filePackagingPath);
                }
            }
            $getGoods->delete();
        }
        return redirect()->back()->with('success', 'Success delete product.');
    }
    public function inventoryDestroy($id)
    {
        $getPlacement = Placement::find($id);
        if ($getPlacement->stock > 0) {
            return redirect()->back()->with('failed', 'Tidak bisa menghapus inventory yang masih memiliki stock.');
        }
        $getPlacement->update([
            'goods_id' => 0,
        ]);
        return redirect()->back()->with('success', 'Success destroy inventory.');
    }
}
