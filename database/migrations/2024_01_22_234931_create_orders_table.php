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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('phone');
            $table->string('country');
            $table->string('city');
            $table->longText('adress');
            $table->string('postal_code')->nullable();
            $table->longText('message')->nullable();
            $table->string('ship_method');
            $table->string('order_method');
            $table->string('total_price');
            $table->bigInteger('productId');
            $table->bigInteger('userId');
            $table->string('order_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
