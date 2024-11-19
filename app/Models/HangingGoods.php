<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HangingGoods extends Model
{
    use HasFactory;

    public function flowOfGoods(): BelongsTo
    {
        return $this->belongsTo(FlowOfGoods::class);
    }
}
