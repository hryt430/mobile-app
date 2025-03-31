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
        Schema::create('products', function (Blueprint $table) {
            $table->id();               //製品のidカラム
            $table->string("name");     //製品の名前のカラム
            $table->double("price");    //製品の値段のカラム
            $table->string("img_url");  //製品の画像のカラム
            $table->timestamps();       //作成,更新日時のカラム
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
