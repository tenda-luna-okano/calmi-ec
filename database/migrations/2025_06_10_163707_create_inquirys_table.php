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
        Schema::create('inquirys', function (Blueprint $table) {
            $table->id('inquirys')->comment('お問い合わせID');
            $table->integer('customer_nickname')->comment('お問い合わせのニックネーム');
            $table->text('user_mail')->comment('問い合わせのメールアドレス');
            $table->text('inquiry_content')->comment('お問い合わせ内容');
            $table->boolean('answered_flg')->comment('回答済みフラグ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquirys');
    }
};
