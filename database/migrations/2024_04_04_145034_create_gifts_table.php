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
        Schema::create('gifts', function (Blueprint $table) {
            $table->id();
            $table->string('mobile')->nullable();
            $table->foreignId('restro_id')->comment("restaurant's id")->nullable();
            $table->foreignId('admin_id')->comment("admin's id")->nullable();
            $table->foreignId('affiliate_id')->comment("affiliate's id")->nullable();
            $table->foreignId('user_id')->comment("user's id")->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=pending 1=success');
            $table->tinyInteger('gift_type')->default(1)->comment('1=gift 2=completemetry');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('restro_id')->references('id')->on('restaurants');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('affiliate_id')->references('id')->on('affiliates');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gifts');
    }
};
