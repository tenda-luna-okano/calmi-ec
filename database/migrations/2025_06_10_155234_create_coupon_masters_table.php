<?php

use Dom\Comment;
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
        Schema::create('coupon_masters', function (Blueprint $table) {
            $table->id('coupon_id')->comment('クーポンID');
            $table->string('coupon_name')->comment('クーポン名');
            $table->string('coupon_code')->comment('クーポンコード');
            $table->text('coupon_detail_explanation')->nullable()->comment('クーポン説明');
            $table->boolean('coupon_is_enable')->default(1)->comment('クーポン使用可能フラグ');
            $table->dateTime('coupon_start_day')->comment('クーポン使用開始日');
            $table->datetime('coupon_end_day')->nullable()->comment('クーポン終了日');
            $table->integer('coupon_stock')->nullable()->comment('クーポン使用可能回数');
            $table->integer('coupon_sale_value')->comment('クーポン割引率');
            $table->unsignedBigInteger('coupon_category')->comment('クーポン対象カテゴリid');
            $table->foreign('coupon_category')->references('category_id')->on('category_masters');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_masters');
    }
};
