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
        Schema::create('redeems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_coupon_id')->comment("user_coupon's id")->nullable();
            $table->foreignId('restro_id')->comment("restaurant's id")->nullable();
            $table->integer('quantity')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('user_coupon_id')->references('id')->on('user_coupons');
            $table->foreign('restro_id')->references('id')->on('restaurants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redeems');
    }
};
