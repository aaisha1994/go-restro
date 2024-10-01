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
        Schema::create('qr_generates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qr_bunch_id')->comment("qr_generate_bunche's id")->nullable();
            $table->foreignId('restro_id')->comment("restaurant's id")->nullable();
            $table->string('qr_code')->nullable();
            $table->tinyInteger('type')->default(0)->comment('0=pending, 1=redeem 1=link');
            $table->tinyInteger('status')->default(0)->comment('0=pending 1=success');
            $table->timestamps();
            $table->foreign('qr_bunch_id')->references('id')->on('qr_generate_bunches');
            $table->foreign('restro_id')->references('id')->on('restaurants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_generates');
    }
};
