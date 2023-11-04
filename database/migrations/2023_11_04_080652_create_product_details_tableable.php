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
        Schema::create('product_details_tableable', function (Blueprint $table) {
            $table->bigIncrements('product_detail_id');
            $table->text('description');
            $table->foreignId('user_id')->constrained;
            $table->foreignId('category_id')->constrained;
            $table->foreignId('brand_id')->constrained;
            $table->foreignId('color_id')->constrained;
            $table->foreignId('size_id')->constrained;
            $table->foreignId('images_id')->constrained;
            $table->integer('stock_quantity')->constrained;
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details_tableable');
    }
};
