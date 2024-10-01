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
        Schema::create('complementaries', function (Blueprint $table) {
            $table->id();
            $table->string('account_type')->nullable();
            $table->integer('validity')->default(0);
            $table->tinyInteger('status')->default(1)->comment('1=active 2=deactive');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complementaries');
    }
};
