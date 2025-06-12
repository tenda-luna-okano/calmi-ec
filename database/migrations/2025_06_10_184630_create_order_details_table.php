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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('order_detail_id')->comment('注文詳細ID');
            $table->unsignedBigInteger('order_id')->comment('注文id');
            $table->unsignedBigInteger('item_id')->comment('商品id');
            $table->string('item_name')->comment('購入時商品名');
            $table->integer('price')->comment('購入時価格(税抜き)');
            $table->integer('price_in_tax')->comment('購入時価格(税込み)');
            $table->integer('count')->comment('購入個数');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
