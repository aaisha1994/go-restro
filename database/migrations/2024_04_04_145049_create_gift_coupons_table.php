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
        Schema::create('gift_coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gift_id')->comment("gift's id")->nullable();
            $table->foreignId('coupon_id')->comment("coupon's id")->nullable();
            $table->integer('quantity')->default(0);
            $table->tinyInteger('status')->default(0)->comment('0=pending 1=success');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('gift_id')->references('id')->on('gifts');
            $table->foreign('coupon_id')->references('id')->on('coupons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gift_coupons');
    }
};
