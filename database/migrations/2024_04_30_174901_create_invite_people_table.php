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
        Schema::create('invite_people', function (Blueprint $table) {
            $table->id();
            $table->foreignId('affiliate_id')->comment("affiliate's id")->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->foreign('affiliate_id')->references('id')->on('affiliates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invite_people');
    }
};
