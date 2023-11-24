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
        Schema::create('Lecturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sensor_jaula');
            $table->foreign('id_sensor_jaula')->references('id')->on('Sensores_Jaula');
            $table->string('Valor');
            $table->timestamp('Fecha_Hora');
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
