<?php

namespace App\Http\Controllers;

use App\Models\FlowOfGoods;
use App\Models\Goods;
use App\Models\HangingGoods;
use App\Models\Placement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FlowOfGoodsController extends Controller
{
    public function hanging($id)
    {
        if (request()->input('return_date') == null) {
            return redirect()->back()->with('error', 'Masukkan tanggal pengembalian!');
        }
        if (request()->input('description')) {
            $hangingGoods = new HangingGoods();
            $hangingGoods->flow_of_goods_id = $id;
            $hangingGoods->return_date = FlowOfGoods::find($id)->return_date;
            $hangingGoods->description = request()->input('description');
            $hangingGoods->save();
        }
        FlowOfGoods::find($id)->update([
            'is_hanging' => true,
            'return_date' => Carbon::createFromFormat('m/d/Y', request()->input('return_date'))
        ]);
        return redirect()->back()->with('success', 'Berhasil memperpanjang peminjaman barang!');
    }
    public function goodsReturn($id)
    {
        $getFlowOfGoods = FlowOfGoods::find($id);
        $getFlowOfGoods->update([
            'is_return' => false,
            'is_hanging' => false
        ]);

        $flowOfGoods = new FlowOfGoods();
        $flowOfGoods->goods_id = $getFlowOfGoods->goods_id;
        $flowOfGoods->goods_flow_type_id = 8;
        if (request()->input('return_same')) {
            $flowOfGoods->quantity = $getFlowOfGoods->quantity;
        } else {
            $flowOfGoods->quantity = request()->input('quantity');
        }
        if (request()->input('placement_id')) {
            $flowOfGoods->base_placement_id = request()->input('placement_id');
            $placement = Placement::find(request()->input('placement_id'));
            if (request()->input('return_same')) {
                $placement->update([
                    'stock' => $placement->stock + $flowOfGoods->quantity
                ]);
                Goods::find($getFlowOfGoods->goods_id)->update([
                    'total_stock' => Goods::find($getFlowOfGoods->goods_id)->total_stock + $flowOfGoods->quantity
                ]);
            } else {
                $placement->update([
                    'stock' => $placement->stock + request()->input('quantity')
                ]);
                Goods::find($getFlowOfGoods->goods_id)->update([
                    'total_stock' => Goods::find($getFlowOfGoods->goods_id)->total_stock + request()->input('quantity')
                ]);
            }
        } else {
            $placement = new Placement();
            $placement->goods_id = $getFlowOfGoods->goods_id;
            $placement->place_id = request()->input('place_id');
            $placement->area_id = request()->input('area_id');
            $placement->rak_id = request()->input('rak_id');
            $placement->shap_id = request()->input('shap_id');
            $placement->stock = $getFlowOfGoods->quantity;
            $placement->save();
            $flowOfGoods->base_placement_id = $placement->id;
        }
        $flowOfGoods->operator_name = request()->input('operator_name');
        $flowOfGoods->description = request()->input('description');
        $flowOfGoods->save();

        if (request()->file('file_image')) {
            $image = request()->file('file_image');
            $new_name_img = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name_img);
            $flowOfGoods->image = $new_name_img;
            $flowOfGoods->save();
        }

        return redirect()->back()->with('success', 'Berhasil mengembalikan peminjaman barang!');
    }
}
