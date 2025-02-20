<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes(); // This is the easiest way
            // Or, if you prefer to be explicit:
            // $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Corresponding drop method
            // Or, if you added the column manually:
            // $table->dropColumn('deleted_at');
        });
    }
};
