<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vacuna extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('vacuna', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('iddueño');
            $table->string('nombre');
            $table->string('nombremascota');
            $table->string('nombreaplicador');
            $table->string('estatus');
            $table->date('fecha');
            $table->date('fecharegistro');
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
        //
        Schema::dropIfExists('vacuna');
    }
}
