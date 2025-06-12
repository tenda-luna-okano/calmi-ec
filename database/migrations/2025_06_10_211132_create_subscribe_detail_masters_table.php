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
        Schema::create('subscribe_detail_masters', function (Blueprint $table) {
            $table->id('subscribe_detail_id')->comment('サブスク商品ID');
            $table->string('subscribe_item_name')->comment('サブスクリプション名');
            $table->integer('subscribe_price')->comment('サブスクリプション価格');
            $table->text('subscribe_detail_explanation')->nullable()->comment('サブスクリプション説明文');
            $table->text('subscribe_img')->nullable()->comment('サブスクリプションイメージ画像');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribe_detail_masters');
    }
};
