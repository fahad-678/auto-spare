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
            $table->string('part_number')->nullable();
            $table->string('oem')->nullable();
            $table->string('description')->nullable();
            $table->float('price')->nullable();
            $table->float('discount')->nullable();
            $table->string('sub_category_id')->nullable();
            $table->string('brand_id')->nullable();
            $table->integer('stock')->nullable();
            $table->enum('status',['AVAILABLE','UNAVAILABLE'])->default('AVAILABLE');
            $table->string('image')->nullable();
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
