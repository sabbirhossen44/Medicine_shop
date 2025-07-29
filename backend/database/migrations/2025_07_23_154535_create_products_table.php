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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('power');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('price');
            $table->integer('discount')->default(0);
            $table->integer('after_discount');
            $table->integer('sold_count')->default(0);
            $table->integer('status')->default(0);
            $table->string('slug');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
