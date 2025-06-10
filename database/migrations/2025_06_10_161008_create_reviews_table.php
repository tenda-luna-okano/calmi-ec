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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('review_id')->comment('レビューID');
            $table->string('review_name')->comment('レビュータイトル');
            $table->integer('user_nickname')->comment('レビュー者ニックネーム');
            $table->unsignedBigInteger('review_item_id')->comment('レビューした商品ID');
            $table->foreign('review_item_id')->references('item_id')->on('item_masters');
            $table->integer('review_star')->comment('評価 -☆の数-');
            $table->text('user_mail')->comment('レビュー者メールアドレス');
            $table->text('review_content')->comment('レビュー内容');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
