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
        Schema::create('order_detail', function (Blueprint $table) {
            $table->unsignedBigInteger("Price");
            $table->unsignedInteger("Quantity");
            $table->unsignedBigInteger("ID_order");
            $table->foreign("ID_order")->references("id")->on("order");
            $table->unsignedBigInteger("ID_product");
            $table->foreign("ID_product")->references("id")->on("product");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detail');
    }
};
