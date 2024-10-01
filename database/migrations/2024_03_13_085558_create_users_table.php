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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('otp')->nullable();
            $table->string('image')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('ref_code')->nullable();
            $table->string('ref_by')->nullable();
            $table->foreignId('affiliate_id')->comment("affiliate's id")->nullable();
            // $table->foreignId('country_id')->comment("country's id")->nullable();
            // $table->foreignId('state_id')->comment("state's id")->nullable();
            // $table->foreignId('city_id')->comment("state's id")->nullable();
            // $table->string('address')->nullable();
            // $table->integer('zip_code')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=pending 1=active 2=deactive');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('affiliate_id')->references('id')->on('affiliates');
            // $table->foreign('country_id')->references('id')->on('countries');
            // $table->foreign('state_id')->references('id')->on('states');
            // $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
