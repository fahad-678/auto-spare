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
            $table->string('name');
            $table->string('description')->nullable();
            $table->float('price')->nullable();;
            $table->float('discount')->nullable();;
            $table->string('image')->nullable();
            $table->string('category_id')->nullable();
            $table->string('brand_id')->nullable();
            $table->integer('stock')->nullable();
            $table->boolean('hot_item')->default(false);
            $table->enum('status',['AVAILABLE','UNAVAILABLE'])->default('AVAILABLE');
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
