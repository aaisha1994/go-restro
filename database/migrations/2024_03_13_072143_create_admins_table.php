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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->string('image')->nullable();
            $table->string('ref_code')->nullable();
            $table->foreignId('country_id')->comment("country's id")->nullable();
            $table->foreignId('state_id')->comment("state's id")->nullable();
            $table->foreignId('city_id')->comment("state's id")->nullable();
            $table->string('address')->nullable();
            $table->integer('zip_code')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=pending 1=active 2=deactive');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
