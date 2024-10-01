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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile')->nullable();
            $table->string('mobile2')->nullable();
            $table->string('logo')->nullable();
            $table->string('ref_code')->nullable();
            $table->string('price_per_person')->nullable();
            $table->foreignId('country_id')->comment("country's id")->nullable();
            $table->foreignId('state_id')->comment("state's id")->nullable();
            $table->foreignId('city_id')->comment("state's id")->nullable();
            $table->string('address')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('meal_preference')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=pending 1=active 2=deactive');
            $table->tinyInteger('admin_status')->default(0)->comment('0=pending 1=active 2=deactive');
            $table->tinyInteger('details_status')->default(0)->comment('0=pending 1=active 2=deactive');
            $table->tinyInteger('top_restro')->default(0)->comment('0=no 1=yes');
            $table->decimal('passport_price',15,2)->default(0);
            $table->integer('validity')->default(30);
            $table->text('terms')->nullable();
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
        Schema::dropIfExists('restaurants');
    }
};
