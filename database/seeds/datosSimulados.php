<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class datosSimulados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // catCursos
        DB::table('catCursos')->insert([
            'nombreCurso' => Str::random(10),
            'fechaAlta' => Carbon::now()->subDays(15),
            'fechaBaja' => Carbon::now(),
            'vigente' => false,
        ]);
        DB::table('catCursos')->insert([
            'nombreCurso' => Str::random(10),
            'fechaAlta' => Carbon::now(),
            'fechaBaja' => Carbon::now()->addDays(10),
            'vigente' => true,
        ]);
        DB::table('catCursos')->insert([
            'nombreCurso' => Str::random(10),
            'fechaAlta' => Carbon::now()->subDays(30),
            'fechaBaja' => Carbon::now(),
            'vigente' => false,
        ]);


        // datMaestro
        DB::table('datMaestro')->insert([
            'matricula' => mt_rand(1000, 9999),
            'paterno' => Str::random(5),
            'materno' => Str::random(5),
            'nombre' => Str::random(5),
            'curp' => Str::random(18),
            'idGradoAca' => 10,
        ]);
        DB::table('datMaestro')->insert([
            'matricula' => mt_rand(1000, 9999),
            'paterno' => Str::random(5),
            'materno' => Str::random(5),
            'nombre' => Str::random(5),
            'curp' => Str::random(18),
            'idGradoAca' => 11,
        ]);
        DB::table('datMaestro')->insert([
            'matricula' => mt_rand(1000, 9999),
            'paterno' => Str::random(5),
            'materno' => Str::random(5),
            'nombre' => Str::random(5),
            'curp' => Str::random(18),
            'idGradoAca' => 12,
        ]);

        //relMaestroCurso
        DB::table('relMaestroCurso')->insert([
            'idMaestro' => 1,
            'idCurso' => 1,
        ]);
        DB::table('relMaestroCurso')->insert([
            'idMaestro' => 1,
            'idCurso' => 2,
        ]);
        DB::table('relMaestroCurso')->insert([
            'idMaestro' => 2,
            'idCurso' => 2,
        ]);
        DB::table('relMaestroCurso')->insert([
            'idMaestro' => 3,
            'idCurso' => 3,
        ]);
    }
    
}
