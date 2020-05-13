@extends('layout.base')

@if(isset($maestro))
    @php
        $title = 'Editar maestro';
        $id = $maestro[0]->idMaestro;
        $name = $maestro[0]->nombre;
        $father = $maestro[0]->paterno;
        $mother = $maestro[0]->materno;
        $plate = $maestro[0]->matricula;
        $curp = $maestro[0]->curp;
        $idGradoAca = $maestro[0]->idGradoAca;
        $action = 'MaestroController@update';
    @endphp
@else
    @php
        $title = 'Crear maestro';
        $id = 0;
        $name = '';
        $father = '';
        $mother = '';
        $plate = 0000;
        $curp = '';
        $idGradoAca = 0;
        $action = 'MaestroController@create';
    @endphp
@endif

@section('card_title')
<span>{{$title}}</span>
<div style="float: right;">
<a href="{{ url('maestro/listado') }}" style="color: white;">
    <svg class="bi bi-arrow-return-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M5.854 5.646a.5.5 0 010 .708L3.207 9l2.647 2.646a.5.5 0 01-.708.708l-3-3a.5.5 0 010-.708l3-3a.5.5 0 01.708 0z" clip-rule="evenodd"/>
        <path fill-rule="evenodd" d="M13.5 2.5a.5.5 0 01.5.5v4a2.5 2.5 0 01-2.5 2.5H3a.5.5 0 010-1h8.5A1.5 1.5 0 0013 7V3a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
    </svg>
</a>
</div>
@endsection

@section('content')
<form action="{{action($action)}}" method="post">
    {{csrf_field()}}
    @if($id != 0)
    <input type="hidden" name="id" id="id" value="{{$id}}">
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$name}}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Apellido paterno</label>
                <input type="text" class="form-control" name="father" id="father" value="{{$father}}" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Apellido materno</label>
                <input type="text" class="form-control" name="mother" id="mother" value="{{$mother}}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Matricula</label>
                <input type="number" class="form-control" name="plate" id="plate" value="{{$plate}}" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">CURP</label>
                <input type="text" class="form-control" name="curp" id="curp" value="{{$curp}}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sel1">Grado Academico:</label>
                <select class="form-control" id="idGradoAca" name="idGradoAca">
                    @foreach($grados as $grado)
                        @if($idGradoAca == $grado->idGradoAca)
                            <option value="{{$grado->idGradoAca}}" selected>
                        @else
                            <option value="{{$grado->idGradoAca}}">
                        @endif
                            {{$grado->gradoAcademico}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <input type="submit" class="btn btn-primary" value="{{$title}}">
</form>
@endsection