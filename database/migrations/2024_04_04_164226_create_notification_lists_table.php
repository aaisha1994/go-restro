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
        Schema::create('notification_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restro_id')->comment("restaurant's id")->nullable();
            $table->foreignId('admin_id')->comment("admin's id")->nullable();
            $table->foreignId('affiliate_id')->comment("affiliate's id")->nullable();
            $table->foreignId('user_id')->comment("user's id")->nullable();
            $table->foreignId('notification_id')->comment("notification's id")->nullable();
            $table->string('title')->nullable();
            $table->string('message')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=pending 1=success');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('restro_id')->references('id')->on('restaurants');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('affiliate_id')->references('id')->on('affiliates');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('notification_id')->references('id')->on('notifications');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_lists');
    }
};
