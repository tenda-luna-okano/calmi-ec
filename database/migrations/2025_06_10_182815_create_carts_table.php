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
        Schema::create('carts', function (Blueprint $table) {
            $table->id('cart_id')->comment('カートID');
            $table->unsignedBigInteger('customer_id')->comment('お客様ID');
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->unsignedBigInteger('item_id')->comment('商品ID');
            $table->foreign('item_id')->references('item_id')->on('item_masters');
            $table->integer('item_count')->comment('購入予定個数');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
