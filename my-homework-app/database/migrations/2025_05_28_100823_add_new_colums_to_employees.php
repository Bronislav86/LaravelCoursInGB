<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('name');
            $table->string('lastName');
            $table->string('position');
            $table->string('email');
            $table->string('address');
            $table->string('workData');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('lastName');
            $table->dropColumn('position');
            $table->dropColumn('email');
            $table->dropColumn('address');
            $table->dropColumn('workData');
        });
    }
};
