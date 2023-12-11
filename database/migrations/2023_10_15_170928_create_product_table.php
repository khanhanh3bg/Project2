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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string("Product_name");
            $table->unsignedBigInteger("Product_price");
            $table->unsignedBigInteger("ID_brand");
            $table->foreign("ID_brand")->references("id")->on("brand");
            $table->unsignedBigInteger("Product_quantity");
            $table->string("Product_image");
            $table->string("Product_description");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
