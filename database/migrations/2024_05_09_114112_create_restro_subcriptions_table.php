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
        Schema::create('restro_subcriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->decimal('amount',15,2)->default(0);
            $table->string('benefits')->nullable();
            $table->tinyInteger('gift_send')->default(0);
            $table->tinyInteger('event_details')->default(0);
            $table->tinyInteger('compliment_coin')->default(0);
            $table->tinyInteger('staff_allocation')->default(0);
            $table->integer('gr_coin')->default(0);
            $table->tinyInteger('status')->default(0)->comment('0=pending 1=active 2=deactive');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restro_subcriptions');
    }
};
