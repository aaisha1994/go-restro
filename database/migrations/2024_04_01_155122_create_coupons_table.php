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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restro_id')->comment("restaurant's id")->nullable();
            $table->string('name')->nullable();
            $table->text('details')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('validity')->default(0);
            $table->string('image')->nullable();
            $table->text('terms')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=pending 1=success');
            $table->integer('redeemed')->default(0);
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
        Schema::dropIfExists('coupons');
    }
};
