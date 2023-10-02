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
Schema::create('bmi_recommends', function (Blueprint $table) {
$table->id();
$table->unsignedBigInteger('bmi_id');
$table->foreign('bmi_id')->references('id')->on('bmis');


$table->unsignedBigInteger('recommend_id');
$table->foreign('recommend_id')->references('id')->on('recommends');
$table->timestamps();


});
}


/**
* Reverse the migrations.
*/
public function down(): void
{
Schema::dropIfExists('bmi_recommends');
}
};



