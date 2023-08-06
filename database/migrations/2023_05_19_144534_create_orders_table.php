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
            $table->longText('cart_id');
            $table->unsignedBigInteger('user_id');
            $table->longText('order_array');
            $table->string('official_name');
            $table->string('location');
            $table->string('phone_number');
            $table->string('delivery_fee');
            $table->string('total');
            $table->boolean('pay_status')->default(false);
            $table->string('status')->nullable();
           

            $table->foreign('user_id')->references('id')->on('users');
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
