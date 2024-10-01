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
        Schema::table('affiliates', function (Blueprint $table) {
            $table->string('city')->nullable();
            $table->string('vehicle_number')->nullable();
            $table->string('agency_name')->nullable();
            $table->tinyInteger('commission_type')->default(1);
            $table->tinyInteger('commission')->default(0);
            $table->string('gst_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('affiliates', function (Blueprint $table) {
            //
        });
    }
};
