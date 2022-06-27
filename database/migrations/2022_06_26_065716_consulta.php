<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Consulta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('consulta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('iddueño');
            $table->string('nombredueño');
            $table->string('nombremascota');
            $table->string('tipo');
            $table->string('peso');
            $table->integer('edad');
            $table->string('sintomas');
            $table->string('receta');
            $table->date('fechaconsulta');
            $table->date('fechaproxima')->nullable();
            
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
        Schema::dropIfExists('consulta');
    }
}
