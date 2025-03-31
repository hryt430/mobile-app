<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    //注文内容との関係を定義
    public function OrderDetail(): HasMany{
        return $this->hasMany(OrderDetail::class, "product_id", "id");
    }
}
