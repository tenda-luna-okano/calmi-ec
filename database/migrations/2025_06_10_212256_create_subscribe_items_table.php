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
        Schema::create('subscribe_items', function (Blueprint $table) {
            $table->id('subscribe_item_id')->comment('サブスクリプション商品詳細ID');
            $table->unsignedBigInteger('subscribe_detail_id')->comment('サブスクに追加する商品ID');
            $table->foreign('subscribe_detail_id')->references('subscribe_detail_id')->on('subscribe_detail_masters');
            $table->unsignedBigInteger('item_id')->comment('商品ID');
            $table->foreign('item_id')->references('item_id')->on('item_masters');
            $table->integer('item_count')->comment('個数');
            $table->datetime('date_subscribe')->comment('どの月のサブスク報酬か(年/月)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribe_items');
    }
};
