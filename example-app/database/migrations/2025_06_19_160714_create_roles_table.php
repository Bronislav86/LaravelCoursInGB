<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function __construct()
    {
        $this->connection = 'second_mysql';
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('second_mysql')->create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('second_mysql')->dropIfExists('roles');
    }
};
