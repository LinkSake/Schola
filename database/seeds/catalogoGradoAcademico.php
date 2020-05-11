<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class catalogoGradoAcademico extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catGradoAcademico')
            ->insert(['gradoAcademico' => 'Primaria trunca']);
        DB::table('catGradoAcademico')
            ->insert(['gradoAcademico' => 'Primaria']);
        DB::table('catGradoAcademico')
            ->insert(['gradoAcademico' => 'Secundaria trunca']);
        DB::table('catGradoAcademico')
            ->insert(['gradoAcademico' => 'Secundaria']);
        DB::table('catGradoAcademico')
            ->insert(['gradoAcademico' => 'Preparatoria trunca']);
        DB::table('catGradoAcademico')
            ->insert(['gradoAcademico' => 'Preparatoria']);
        DB::table('catGradoAcademico')
            ->insert(['gradoAcademico' => 'Técnico']);
        DB::table('catGradoAcademico')
            ->insert(['gradoAcademico' => 'Técnico universitario']);
        DB::table('catGradoAcademico')
            ->insert(['gradoAcademico' => 'Carrera trunca']);
        DB::table('catGradoAcademico')
            ->insert(['gradoAcademico' => 'Licenciatura']);
        DB::table('catGradoAcademico')
            ->insert(['gradoAcademico' => 'Maestría']);
        DB::table('catGradoAcademico')
            ->insert(['gradoAcademico' => 'Doctorado']);
    }
}
