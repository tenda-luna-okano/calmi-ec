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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id')->comment('お客様ID');
            $table->string('password')->comment('お客様パスワード');
            $table->string('customer_first_name')->comment('姓（漢字）');
            $table->string('customer_last_name')->comment('名（漢字）');
            $table->string('customer_first_furigana')->comment('姓（カタカナ）');
            $table->string('customer_last_furigana')->comment('名（カタカナ）');
            $table->string('email')->comment('メールアドレス');
            $table->string('customer_tel')->comment('電話番号');
            $table->date('customer_birthday')->nullable()->comment('誕生日');
            $table->unsignedBigInteger('payment_id')->nullable()->comment('登録済み支払情報');
            $table->foreign('payment_id')->references('payment_id')->on('payments');
            $table->unsignedBigInteger('customer_post_number')->comment('郵便番号');
            $table->string('customer_states')->comment('郵送先住所(都道府県)');
            $table->string('customer_municipalities')->comment('郵送先住所(市区町村・番地)');
            $table->string('customer_building_name')->nullable()->comment('郵送先住所(建物名・部屋番号)');
            $table->boolean('customer_status')->comment('会員ステータスフラグ');
            $table->boolean('customer_subscribe_flg')->comment('サブスクフラグ');
            $table->boolean('mail_magazine_flg')->comment('メールマガジン受信フラグ');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
