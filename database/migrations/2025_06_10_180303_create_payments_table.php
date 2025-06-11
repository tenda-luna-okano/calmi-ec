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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id')->comment('支払情報ID');
            $table->string('payment_name')->comment('支払方法名');
            $table->integer('card_number')->comment('カード番号');
            $table->integer('expire')->comment('有効期限');
            $table->string('card_customer_name')->comment('カード名義');
            $table->boolean('can_user_flg')->comment('有効な支払方法フラグ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
