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
        Schema::create('subscription_promos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_id')->comment("subscription's id")->nullable();
            $table->string('promo_code')->nullable();
            $table->integer('redeemed')->default(0);
            $table->integer('validity')->default(0);
            $table->integer('discount')->default(0);
            $table->tinyInteger('status')->default(0)->comment('0=pending 1=active 2=deactive');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('subscription_id')->references('id')->on('subscriptions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_promos');
    }
};
