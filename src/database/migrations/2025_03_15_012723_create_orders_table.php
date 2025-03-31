<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();                                   //注文のidカラム
            $table->double("total_price");                  //注文の合計値段のカラム
            $table->string("order_status");                 //注文状況のカラム
            $table->timestamp("pickup_time")->nullable();   //商品受け取り時間のカラム
            $table->timestamps();                           //作成、更新日時のカラム
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
