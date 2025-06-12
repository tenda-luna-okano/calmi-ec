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
        Schema::create('post_numbers', function (Blueprint $table) {
            $table->integer('post_number')->comment('郵便番号');
            $table->string('states')->comment('住所(都道府県)');
            $table->string('municipalities')->nullable()->comment('住所(市区町村・番地)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_numbers');
    }
};
