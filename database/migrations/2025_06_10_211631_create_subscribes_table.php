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
        Schema::create('subscribes', function (Blueprint $table) {
            $table->id('subscribe_id')->comment('サブスクID');

            $table->unsignedBigInteger('customer_id')->comment('お客様ID');
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->unsignedBigInteger('subscribe_detail_id')->nullable()->comment('サブスク詳細ID');
            $table->foreign('subscribe_detail_id')->references('subscribe_detail_id')->on('subscribe_detail_masters');
            $table->unsignedBigInteger('payment_id')->nullable()->comment('支払方法');
            $table->foreign('payment_id')->references('payment_id')->on('payments');

            $table->datetime('subscribe_start_day')->comment('サブスク開始日時');
            $table->datetime('subscribe_end_day')->comment('サブスク終了日時');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribes');
    }
};
