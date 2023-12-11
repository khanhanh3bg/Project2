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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("Order_status");
            $table->date("Order_date");
            $table->unsignedBigInteger("ID_user");
            $table->foreign("ID_user")->references("id")->on("users");
            $table->unsignedBigInteger("ID_transport");
            $table->foreign("ID_transport")->references("id")->on("transport");        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
