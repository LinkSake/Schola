<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ScholaTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catCursos', function (Blueprint $table) {
            $table->bigIncrements('idCurso');
            $table->string('nombreCurso');
            $table->dateTime('fechaAlta');
            $table->dateTime('fechaBaja');
            $table->boolean('vigente');
        });

        Schema::create('catGradoAcademico', function (Blueprint $table) {
            $table->bigIncrements('idGradoAca');
            $table->string('gradoAcademico');
        });

        Schema::create('datMaestro', function (Blueprint $table) {
            $table->bigIncrements('idMaestro');
            $table->integer('matricula');
            $table->string('paterno');
            $table->string('materno');
            $table->string('nombre');
            $table->string('curp');
            // $table->bigIncrements('idGradoAca');
        });

        Schema::table('datMaestro', function (Blueprint $table) {
            $table->unsignedBigInteger('idGradoAca');
            $table->foreign('idGradoAca')
                ->references('idGradoAca')
                ->on('catGradoAcademico');
        });

        Schema::create('relMaestroCurso', function (Blueprint $table) {
            $table->bigIncrements('idMaestroCurso');
            // $table->bigIncrements('idMaestro');
            // $table->bigIncrements('idCurso');
        });

        Schema::table('relMaestroCurso', function (Blueprint $table) {
            $table->unsignedBigInteger('idMaestro');
            $table->foreign('idMaestro')
                ->references('idMaestro')
                ->on('datMaestro');
            $table->unsignedBigInteger('idCurso');
            $table->foreign('idCurso')
                ->references('idCurso')
                ->on('catCursos');
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
}
