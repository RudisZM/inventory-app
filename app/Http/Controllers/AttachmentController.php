<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\FlowOfGoods;
use App\Models\Goods;
use App\Models\GoodsAttachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function index()
    {
        $attachments = Attachment::orderByDesc('created_at')->paginate(10);
        $goodies = Goods::orderByDesc('created_at')->get();
        return view('attachment.index', compact('attachments', 'goodies'));
    }
    public function store(Request $request)
    {
        if ($request->input('category') == 0) {
            return back()->with('error', 'Tolong pilih attachment category.');
        }

        if ($request->file('image')) {
            $image = $request->file('image');
            $namaGambar = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $namaGambar);
            $request->request->add(['image' => $namaGambar]);
        } else {
            $namaGambar = 'no-image.jpg';
        }
        $attachment = new Attachment();
        if ($attachment->count() === 0) {
            $attachment->id = 10001;
        }
        $attachment->image = $namaGambar;
        $attachment->category = $request->input('category');
        $attachment->quantity = $request->input('quantity');
        $attachment->recipient = $request->input('recipient');
        $attachment->description = $request->input('description');
        $attachment->save();

        if ($request->input('goods_id')) {
            foreach ($request->input('goods_id') as $key => $value) {
                $goodsattachment = new GoodsAttachment();
                $goodsattachment->attachment_id = $attachment->id;
                $goodsattachment->goods_id = $value;
                $goodsattachment->save();
            }
            $attachment->is_connect = true;
            $attachment->update();
        }

        if ($request->input('goods_id') != null && $request->input('quantity') != null) {
            foreach ($request->input('goods_id') as $key => $value) {
                $getGoods = Goods::find($value);
                $getGoodsStock = $getGoods->total_stock + $request->input('quantity');
                $getGoods->update([
                    'total_stock' => $getGoodsStock,
                ]);

                $flowOfGoods = new FlowOfGoods();
                $flowOfGoods->goods_id = $value;
                $flowOfGoods->goods_flow_type_id = 1;
                $flowOfGoods->quantity = $request->input('quantity');
                $flowOfGoods->description = 'Penambahan stock dari attachment';
                $flowOfGoods->save();
            }
        }

        return redirect()->back()->with('success', 'Berhasil menambah attachment.');
    }
}
