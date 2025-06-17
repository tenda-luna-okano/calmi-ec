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
        Schema::create('columns', function (Blueprint $table) {
            $table->id('column_id')->comment('カラムID');
            $table->string('column_name')->comment('コラムタイトル');
            $table->unsignedBigInteger('admin_user_id')->comment('作成者ID');
            $table->foreign('admin_user_id')->references('admin_user_id')->on('admin_users');
            $table->text('column_img')->nullable()->comment('コラムイメージ画像');
            $table->text('column_content')->comment('コラム内容');
            $table->datetime('start_show')->nullable()->comment('表示開始日時');
            $table->datetime('expire_day')->nullable()->comment('表示終了日時');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('columns');
    }
};
