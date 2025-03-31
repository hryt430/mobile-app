<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    /** @use HasFactory<\Database\Factories\OrderDetailFactory> */
    use HasFactory;

    // 注文との関係を定義
    public function Order(): BelongsTo{
        return $this->belongsTo(Order::class, "order_id", "id");
    }

    // 製品との関係を定義
    public function Product(): BelongsTo{
        return $this->belongsTo(Product::class, "product_id", "id");
    }
}
