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
        Schema::create('user_coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coupon_id')->comment("coupon's id")->nullable();
            $table->foreignId('gift_id')->comment("gift's id")->nullable();
            $table->foreignId('passport_id')->comment("passport's id")->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('pending')->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=pending 1=success');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('coupon_id')->references('id')->on('coupons');
            $table->foreign('gift_id')->references('id')->on('gifts');
            $table->foreign('passport_id')->references('id')->on('passports');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_coupons');
    }
};
