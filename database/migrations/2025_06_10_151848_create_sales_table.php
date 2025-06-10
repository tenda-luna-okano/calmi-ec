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
        Schema::create('sales', function (Blueprint $table) {
            $table->id('sale_id')->comment('セールid');
            $table->string('sale_name')->comment('セール名');
            $table->text('sale_detail_explanation')->comment('セール説明文');
            $table->dateTime('sale_start_day')->comment('セール開始日');
            $table->dateTime('sale_end_day')->nullable()->comment('セール終了日');
            $table->boolean('sale_is_enable')->comment('セール実施フラグ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
