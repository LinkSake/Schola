<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaestroController extends Controller
{
    public function list()
    {
        $maestros = DB::select('CALL leerMaestros');
        return view('maestros/listado',['maestros' => $maestros]);
    }

    public function new()
    {
        $grados = DB::select('CALL leerGradoAcademico');
        return view('maestros/detalle',['grados' => $grados]);
    }

    public function create(Request $request)
    {
        $plate = $this->validateInt($request->input('plate'));
        $father = $this->validateString($request->input('father'));
        $mother = $this->validateString($request->input('mother'));
        $name = $this->validateString($request->input('name'));
        $curp = $this->validateString($request->input('curp'));
        $idGradoAca = $this->validateInt($request->input('idGradoAca'));
        $result = DB::select('
            CALL crearNuevoMaestro(?,?,?,?,?,?)
        ', array($plate, $father, $mother, $name, $curp, $idGradoAca));
        return redirect()->action('MaestroController@list');
    }

    public function edit($id)
    {
        $maestro = DB::table('datMaestro')
            ->where('idMaestro', '=', $id)
            ->get();
        $grados = DB::select('CALL leerGradoAcademico');
        return view('maestros/detalle',[
            'maestro' => $maestro,
            'grados' => $grados
            ]);
    }

    public function update(Request $request)
    {
        $plate = $this->validateInt($request->input('plate'));
        $father = $this->validateString($request->input('father'));
        $mother = $this->validateString($request->input('mother'));
        $name = $this->validateString($request->input('name'));
        $curp = $this->validateString($request->input('curp'));
        $idGradoAca = $this->validateInt($request->input('idGradoAca'));
        $result = DB::select('
            CALL editarMaestro(?,?,?,?,?,?)
        ', array($plate, $father, $mother, $name, $curp, $idGradoAca));
        return redirect()->action('MaestroController@list');
    }

    public function remove($id)
    {
        $maestro = DB::table('datMaestro')
            ->where('idMaestro', '=', $id)
            ->get();
        return view('maestros/eliminar',['maestro' => $maestro]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $maestro = DB::select('
            CALL eliminarMaestro(?)
        ', array($id));
        return redirect()->action('MaestroController@list');
    }
}
