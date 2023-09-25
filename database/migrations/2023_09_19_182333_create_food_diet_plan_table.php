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
        Schema::create('food_diet_plan', function (Blueprint $table) {

            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')->references('id')->on('food');

            $table->unsignedBigInteger('diet_plan_id');
            $table->foreign('diet_plan_id')->references('id')->on('diet_plans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_diet_plan');
    }
};
