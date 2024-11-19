<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Goods extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function goodsCategory(): BelongsTo
    {
        return $this->belongsTo(GoodsCategory::class);
    }
    public function tag(): HasMany
    {
        return $this->hasMany(Tag::class);
    }
    public function placement(): HasMany
    {
        return $this->hasMany(Placement::class);
    }
    public function scopeSearch(Builder $query)
    {
        if (request()->filled('search')) {
            $searchTerm = request()->input('search');

            // Cari tag berdasarkan nama
            $tag = Tag::where('name', 'like', '%' . $searchTerm . '%')->first();
            if ($tag) {
                return $query->where('id', $tag->goods_id);
            }

            // Cari berdasarkan nama, kode, atau deskripsi
            return $query->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('code', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }
    }

    public function scopeFilter(Builder $query)
    {
        // Reset filter jika parameter `all` ada
        if (request()->has('all')) {
            session()->forget(['goods_category', 'placement', 'tag', 'price', 'stock']);
        }

        // Filter berdasarkan kategori barang
        if (request()->filled('goods_category')) {
            session()->put('goods_category', request()->input('goods_category'));
        }
        if (session()->has('goods_category')) {
            $categories = session()->get('goods_category');
            $query->whereHas('goodsCategory', function ($query) use ($categories) {
                $query->whereIn('id', $categories);
            });
        }

        // Filter berdasarkan lokasi barang
        if (request()->filled('placement')) {
            session()->put('placement', request()->input('placement'));
        }
        if (session()->has('placement')) {
            $placements = session()->get('placement');
            $query->whereHas('placement', function ($query) use ($placements) {
                $query->whereIn('place_id', $placements);
            });
        }

        // Filter berdasarkan tag
        if (request()->filled('tag')) {
            session()->put('tag', request()->input('tag'));
        }
        if (session()->has('tag')) {
            $tags = session()->get('tag');
            $query->whereHas('tag', function ($query) use ($tags) {
                $query->whereIn('id', $tags);
            });
        }

        // Filter berdasarkan harga
        if (request()->filled('price')) {
            session()->put('price', request()->input('price'));
        }
        if (session()->has('price')) {
            $query->where('price', session()->get('price'));
        }

        // Filter berdasarkan stok
        if (request()->filled('stock')) {
            session()->put('stock', request()->input('stock'));
        }
        if (session()->has('stock')) {
            $query->where('total_stock', session()->get('stock'));
        }
    }
}
