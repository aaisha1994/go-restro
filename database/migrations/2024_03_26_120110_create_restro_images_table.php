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
        Schema::create('restro_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restro_id')->comment("restaurant's id")->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('image_type')->default(1)->comment('1=image 2=menu');
            $table->tinyInteger('status')->default(1)->comment('1=active 2=deactive');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('restro_id')->references('id')->on('restaurants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restro_images');
    }
};
