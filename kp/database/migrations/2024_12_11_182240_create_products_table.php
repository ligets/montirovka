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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->float('price');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string("img_path");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('brands');
    }
};
