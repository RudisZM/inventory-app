<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asset extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
    public function rak(): BelongsTo
    {
        return $this->belongsTo(Rak::class);
    }
    public function shap(): BelongsTo
    {
        return $this->belongsTo(Shap::class);
    }
}
