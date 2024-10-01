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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->comment("user's id")->nullable();
            $table->foreignId('restro_id')->comment("restaurant's id")->nullable();
            $table->foreignId('subscription_id')->comment("subscription's id")->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('order_no')->nullable();
            $table->decimal('amount',15,2)->default(0);
            $table->decimal('ref_amount',15,2)->default(0);
            $table->string('ref_code')->nullable();
            $table->tinyInteger('tr_type')->default(1)->comment('1=restro 2=subscription');
            $table->tinyInteger('status')->default(0)->comment('0=pending 1=success');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('restro_id')->references('id')->on('restaurants');
            $table->foreign('subscription_id')->references('id')->on('subscriptions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
