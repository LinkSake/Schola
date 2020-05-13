@extends('layout.base')

@if(isset($maestroCurso))
    @php
        $title = 'Editar relación';
        $id = $maestroCurso[0]->idMaestroCurso;
        $idMaestro = $maestroCurso[0]->idMaestro;
        $idCurso = $maestroCurso[0]->idCurso;
        $action = 'MaestroCursoController@update';
    @endphp
@else
    @php
        $title = 'Crear relación';
        $id = 0;
        $idMaestro = 0;
        $idCurso = 0;
        $action = 'MaestroCursoController@create';
    @endphp
@endif

@section('card_title')
<span>{{$title}}</span>
<div style="float: right;">
<a href="{{ url('/') }}" style="color: white;">
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
        <div class="col-md-12">
            <div class="form-group">
                <label for="sel1">El maestro...</label>
                <select class="form-control" id="idMaestro" name="idMaestro">
                    @foreach($maestros as $maestro)
                        @if($idMaestro == $maestro->idMaestro)
                            <option value="{{$maestro->idMaestro}}" selected>
                        @else
                            <option value="{{$maestro->idMaestro}}">
                        @endif
                        {{
                            $maestro->nombre . ' ' .
                            $maestro->paterno . ' ' . 
                            $maestro->materno . ' ('.
                            $maestro->matricula . ')'
                        }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="sel2">Dará el curso...</label>
                <select class="form-control" id="idGradoAca" name="idGradoAca">
                    @foreach($cursos as $curso)
                        @if($idCurso == $curso->idCurso)
                            <option value="{{$curso->idCurso}}" selected>
                        @else
                            <option value="{{$curso->idCurso}}">
                        @endif
                            {{$curso->nombreCurso}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <input type="submit" class="btn btn-primary" value="{{$title}}">
</form>
@endsection