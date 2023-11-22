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
        Schema::create('Sensores_Jaula', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sensor');
            $table->foreing('id_sensor')->references('id')->on('Sensores');
            $table->unsignedBigInteger('id_jaula');
            $table->foreing('id_jaula')->references('id')->on('Jaulas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
