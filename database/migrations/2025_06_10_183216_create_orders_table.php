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
            $table->id('order_id')->comment('注文履歴ID');
            $table->integer('payment_name')->nullable()->comment('支払方法');
            $table->unsignedBigInteger('payment_id')->comment('支払方法ID');
            $table->foreign('payment_id')->references('payment_id')->on('payments');
            $table->unsignedBigInteger('customer_id')->comment('ユーザーID');
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->integer('delivery_post_number')->comment('郵送先郵便番号');
            $table->string('delivery_states')->comment('郵送先住所(都道府県)');
            $table->string('delivery_municipalities')->comment('郵送先住所(市区町村・番地)');
            $table->string('delivery_building_name')->nullable()->comment('郵送先住所(建物名・部屋番号)');
            $table->string('delivery_postage')->nullable()->comment('郵送費');
            $table->integer('order_price')->comment('注文合計額(税抜き)');
            $table->integer('order_price_in_tax')->comment('注文合計額(税込み)');
            $table->boolean('is_paid')->comment('支払済みフラグ');
            $table->boolean('is_delivery')->comment('配送済みフラグ');
            $table->dateTime('delivery_day')->nullable()->comment('配送日');
            $table->timestamps();
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
