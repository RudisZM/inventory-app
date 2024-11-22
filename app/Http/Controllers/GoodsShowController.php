<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Asset;
use App\Models\Attachment;
use App\Models\FlowOfGoods;
use App\Models\Goods;
use App\Models\GoodsCategory;
use App\Models\OutboundType;
use App\Models\Place;
use App\Models\Placement;
use App\Models\Rak;
use App\Models\Shap;
use Illuminate\Http\Request;

class GoodsShowController extends Controller
{

    public function goodsShow($id)
    {
        // Retrieve goods and related relationships (check if $goods is found)
        $goods = Goods::with(['goodsCategory', 'tag', 'placement'])->find($id);

        // Check if goods exist
        if (!$goods) {
            return redirect()->route('goods.index')->with('error', 'Goods not found.');
        }
        $places = Place::all();
        $placements = Placement::with(['goods', 'place', 'area', 'rak', 'shap'])
            ->where('goods_id', $goods->id)
            ->orderByDesc('id')
            ->get();
        $attachments = Attachment::where('is_connect', false)
            ->orderByDesc('id')
            ->get();
        $categories = GoodsCategory::all();
        $assets = Asset::with(['place', 'area', 'rak', 'shap'])->where('goods_id', $goods->id)
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
}
