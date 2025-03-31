<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    // 注文内容と関係を定義
    public function OrderDetail(): HasMany{
        return $this->hasMany(OrderDetail::class, "order_id","id");
    }
}
