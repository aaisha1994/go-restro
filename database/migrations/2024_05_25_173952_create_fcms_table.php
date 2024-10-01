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
        Schema::create('fcms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->comment("user's id")->nullable();
            $table->foreignId('restro_id')->comment("restaurant's id")->nullable();
            $table->foreignId('admin_id')->comment("admin's id")->nullable();
            $table->foreignId('affiliate_id')->comment("affiliate's id")->nullable();
            $table->tinyInteger('type')->default(0)->comment('0=web 1=android 2=ios');
            $table->string('fcm_token')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('restro_id')->references('id')->on('restaurants');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('affiliate_id')->references('id')->on('affiliates');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fcms');
    }
};
