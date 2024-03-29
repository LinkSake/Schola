<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaestroCursoController extends GeneralController
{

    public function new()
    {
        $maestros = DB::select('CALL leerMaestros');
        $cursos = DB::select('CALL leerCursos');
        return view('maestroCurso/detalle',[
            'maestros' => $maestros,
            'cursos' => $cursos
            ]);
    }

    public function create(Request $request)
    {
        $idMaestro = $this->validateInt($request->input('idMaestro'));
        $idCurso = $this->validateInt($request->input('idCurso'));
        $result = DB::select('
            CALL crearNuevoMaestroCurso(?,?)
        ', array($idMaestro, $idCurso));
        return redirect()->action('GeneralController@index');
    }

    public function edit($id)
    {
        $maestroCurso = DB::table('relMaestroCurso')
            ->where('idMaestroCurso', '=', $id)
            ->get();
        $maestros = DB::select('CALL leerMaestros');
        $cursos = DB::select('CALL leerCursos');
        return view('maestroCurso/detalle',[
            'maestroCurso' => $maestroCurso,
            'maestros' => $maestros,
            'cursos' => $cursos
            ]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $idMaestro = $this->validateInt($request->input('idMaestro'));
        $idCurso = $this->validateInt($request->input('idCurso'));
        $result = DB::select('
            CALL editarMaestroCurso(?,?,?)
        ', array($id,$idMaestro, $idCurso));
        return redirect()->action('GeneralController@index');
    }

    public function remove($id)
    {
        $maestroCurso = DB::table('relMaestroCurso')
            ->where('idMaestroCurso', '=', $id)
            ->get();
        $maestros = DB::select('CALL leerMaestros');
        $cursos = DB::select('CALL leerCursos');
        return view('maestroCurso/eliminar',[
            'maestroCurso' => $maestroCurso,
            'maestros' => $maestros,
            'cursos' => $cursos
            ]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $maestroCurso = DB::select('
            CALL eliminarMaestroCurso(?)
        ', array($id));
        return redirect()->action('GeneralController@index');
    }
}
