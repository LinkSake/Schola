<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class CursoController extends GeneralController
{
    public function list()
    {
        $cursos = DB::select('CALL leerCursos');
        return view('cursos/listado',['cursos' => $cursos]);
    }

    public function new()
    {
        return view('cursos/detalle');
    }

    public function create(Request $request)
    {
        $name = $this->validateString($request->input('name'));
        $init = $this->validateDatetime($request->input('init'));
        $end = $this->validateDatetime($request->input('end'));
        $valid = $this->valueToBool($request->input('active'));
        $result = DB::select('
            CALL crearNuevoCurso(?,?,?,?)
        ', array($name,$init,$end,$valid));
        return redirect()->action('CursoController@list');
    }

    public function edit($id)
    {
        $curso = DB::table('catCursos')
            ->where('idCurso', '=', $id)
            ->get();
        return view('cursos/detalle',['curso' => $curso]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $name = $this->validateString($request->input('name'));
        $init = $this->validateDatetime($request->input('init'));
        $end = $this->validateDatetime($request->input('end'));
        $valid = $this->valueToBool($request->input('active'));
        $curso = DB::select('
            CALL editarCurso(?,?,?,?,?)
        ', array($id, $name, $init, $end, $valid));
        return redirect()->action('CursoController@list');
    }

    public function remove($id)
    {
        $curso = DB::table('catCursos')
            ->where('idCurso', '=', $id)
            ->get();
        return view('cursos/eliminar',['curso' => $curso]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $curso = DB::select('
            CALL eliminarCurso(?)
        ', array($id));
        return redirect()->action('CursoController@list');
    }
}