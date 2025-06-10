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
        Schema::create('item_masters', function (Blueprint $table) {
            $table->id('item_id')->comment('アイテムID');
            $table->unsignedBigInteger('item_category')->comment('カテゴリID');
            $table->foreign('item_category')->references('category_id')->on('category_masters');
            $table->integer('item_price')->comment('税抜き価格');
            $table->integer('item_price_in_tax')->comment('税込み価格');
            $table->boolean('seling_flg')->comment('販売フラグ');
            $table->unsignedBigInteger('sale_id')->nullable()->comment('セール番号');
            $table->foreign('sale_id')->references('sale_id')->on('sales');
            $table->text('item_detail_explanation')->nullable()->comment('商品説明');
            $table->text('item_img')->nullable()->comment('商品画像');
            $table->integer('item_stock')->comment('商品在庫');
            $table->float('item_review_star')->nullable()->comment('商品評価');
            $table->boolean('special_subscribe_flg')->nullable()->comment('特別サブスクプレゼントフラグ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_masters');
    }
};
