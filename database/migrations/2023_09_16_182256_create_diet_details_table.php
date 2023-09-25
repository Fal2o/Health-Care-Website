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
        Schema::create('diet_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('diet_id');
            $table->foreign('diet_id')->references('id')->on('diet_plans');


            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')->references('id')->on('food');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diet_details');
    }
};
