<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FlowOfGoods extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function goods(): BelongsTo
    {
        return $this->belongsTo(Goods::class);
    }
    public function basePlacement(): BelongsTo
    {
        return $this->belongsTo(Placement::class, 'base_placement_id', 'id');
    }
    public function destinationPlacement(): BelongsTo
    {
        return $this->belongsTo(Placement::class, 'destination_placement_id', 'id');
    }
    public function hangingGoods(): HasMany
    {
        return $this->hasMany(HangingGoods::class);
    }
    public function goodsFlowType(): BelongsTo
    {
        return $this->belongsTo(GoodsFlowType::class);
    }
    public function outboundType(): BelongsTo
    {
        return $this->belongsTo(OutboundType::class);
    }
    public function scopeFilter(Builder $query): void
    {

        // ===== Filter Berdasarkan Nama Barang =====
        if (request('search') == '') {
            session()->forget('search');
        }
        if (request('search')) {
            session()->put('search', request('search'));
        }

        if (session()->has('search')) {
            $query->whereHas('goods', function ($query) {
                $query->where('name', 'like', '%' . session()->get('search') . '%');
            });
        }

        // ===== Filter Berdasarkan Kategori Aliran Barang =====
        if (request('flow_category')) {
            if (request('flow_category') == 'all') {
                session()->forget(['flow_category', 'flow_placement', 'search']);
            } else {
                session()->put('flow_category', request('flow_category'));
            }
        }

        if (session()->has('flow_category')) {
            $query->where('goods_flow_type_id', session()->get('flow_category'));
        }

        // ===== Filter Berdasarkan Rentang Tanggal =====
        $dateRanges = [
            'hari ini' => [Carbon::now()->format('Y-m-d'), Carbon::now()->format('Y-m-d')],
            '7 hari terakhir' => [Carbon::now()->subDays(7)->format('Y-m-d'), Carbon::now()->format('Y-m-d')],
            '30 hari terakhir' => [Carbon::now()->subDays(30)->format('Y-m-d'), Carbon::now()->format('Y-m-d')],
            '90 hari terakhir' => [Carbon::now()->subDays(90)->format('Y-m-d'), Carbon::now()->format('Y-m-d')],
            '180 hari terakhir' => [Carbon::now()->subDays(180)->format('Y-m-d'), Carbon::now()->format('Y-m-d')],
            '1 tahun terakhir' => [Carbon::now()->subYear()->format('Y-m-d'), Carbon::now()->format('Y-m-d')],
        ];

        if (request('filter_date_range')) {
            $range = request('filter_date_range');

            if ($range == 'semua data') {
                session()->forget(['start', 'end', 'filter_date_range']);
            } elseif (array_key_exists($range, $dateRanges)) {
                session()->put('filter_date_range', $range);
                session()->forget(['start', 'end']);
                $query->whereBetween('created_at', $dateRanges[$range]);
            }
        } elseif (session()->has('filter_date_range') && array_key_exists(session('filter_date_range'), $dateRanges)) {
            $query->whereBetween('created_at', $dateRanges[session('filter_date_range')]);
        }

        // ===== Filter Berdasarkan Tanggal Manual (Start & End) =====
        if (request('start') && request('end')) {
            session()->forget('filter_date_range');
            session()->put('start', Carbon::parse(request('start'))->format('Y-m-d'));
            session()->put('end', Carbon::parse(request('end'))->format('Y-m-d'));
        }
        if (session()->has('start') && session()->has('end')) {
            $query->whereBetween('created_at', [
                Carbon::parse(session()->get('start')),
                Carbon::parse(session()->get('end')),
            ]);
        }

        // ===== Filter Berdasarkan Nama Barang =====
        if (request('name')) {
            $query->whereHas('goods', function ($query) {
                $query->where('name', 'like', '%' . request('name') . '%');
            });
        }

        // ===== Filter Berdasarkan Lokasi =====
        if (request('flow_placement')) {
            session()->put('flow_placement', request('flow_placement'));
        }

        // Ambil nilai dari sesi
        $placeIds = session()->get('flow_placement');

        if (!empty($placeIds)) {
            // Pastikan $placeIds berbentuk array
            $placeIds = (array) $placeIds;
            // Tambahkan kondisi ke query
            $query->whereHas('destinationPlacement', function ($query) use ($placeIds) {
                $query->whereIn('place_id', $placeIds);
            })->orWhereHas('basePlacement', function ($query) use ($placeIds) {
                $query->whereIn('place_id', $placeIds);
            });
        }
    }
}
