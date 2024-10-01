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
        Schema::create('my_passports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->comment("user's id")->nullable();
            $table->foreignId('restro_id')->comment("restaurant's id")->nullable();
            $table->date('expire_date')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=pending 1=success');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('restro_id')->references('id')->on('restaurants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_passports');
    }
};
