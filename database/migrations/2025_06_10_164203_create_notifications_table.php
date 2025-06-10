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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('notification_id')->comment('お知らせID');
            $table->string('notification_name')->nullable()->comment('お知らせタイトル');
            $table->unsignedBigInteger('admin_user_id')->comment('作成した管理者ID');
            $table->foreign('admin_user_id')->references('admin_user_id')->on('admin_users');
            $table->text('notification_img')->nullable()->comment('お知らせ画像');
            $table->text('notification_content')->comment('お知らせ内容');
            $table->dateTime('start_show')->nullable()->comment('お知らせ表示開始日時');
            $table->dateTime('expire_day')->nullable()->comment('お知らせ表示期限');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
