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
            $table->text('description');
            $table->decimal('dimension');
            $table->decimal('weight');
            $table->decimal('price');
            $table->unsignedInteger('discount_percentage')->nullable();
            $table->decimal('discount_price')->nullable();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('type_id')->constrained();
            $table->unsignedInteger('stock')->default(0);
            $table->string('image');
            $table->timestamps();
            $table->softDeletes();
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
