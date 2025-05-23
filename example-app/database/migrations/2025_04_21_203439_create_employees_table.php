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

    public function up()
        {
            Schema::connection('second_mysql')->create('employees', function (Blueprint $table) {
                $table->id();
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
            Schema::connection('second_mysql')->dropIfExists('employees');
        }
};
