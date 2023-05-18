<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencias', function (Blueprint $table) {
            $table->id('id');
            $table->String('Nombre');
            $table->String('Apellido');
            $table->integer('AnnoGraduado');
            $table->String('Direccion');
            $table->String('AreaTrabajo');
            $table->String('FotocopiaTitulo');
            $table->String('ActaSolicitud');
            $table->String('EdicionMaestria');
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
        Schema::dropIfExists('evidencias');
    }
}
