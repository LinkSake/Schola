@extends('layout.base')

@section('card_title')
<span>¿Estás seguro de que quieres eliminar el curso?</span>
<div style="float: right;">
<a href="{{ url('curso/listado') }}" style="color: white;">
    <svg class="bi bi-arrow-return-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M5.854 5.646a.5.5 0 010 .708L3.207 9l2.647 2.646a.5.5 0 01-.708.708l-3-3a.5.5 0 010-.708l3-3a.5.5 0 01.708 0z" clip-rule="evenodd"/>
        <path fill-rule="evenodd" d="M13.5 2.5a.5.5 0 01.5.5v4a2.5 2.5 0 01-2.5 2.5H3a.5.5 0 010-1h8.5A1.5 1.5 0 0013 7V3a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
    </svg>
</a>
</div>
@endsection

@section('content')
<div class="alert alert-danger" role="alert">
    Una vez eliminado un curso, no podrás recuperarlo
</div>
<ul class="list-group">
    <li class="list-group-item list-group-item-info">{{$curso[0]->nombreCurso}}</li>
    <li class="list-group-item">
        <b>Inicio del curso: </b>
        {{$curso[0]->fechaAlta}}
    </li>
    <li class="list-group-item">
        <b>Fin del curso: </b>
        {{$curso[0]->fechaBaja}}
    </li>
    <li class="list-group-item">
        <b>Vigente: </b>
        @if ($curso[0]->vigente == 1)
            <svg class="bi bi-check" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M13.854 3.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3.5-3.5a.5.5 0 11.708-.708L6.5 10.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/>
            </svg>
        @else
            <svg class="bi bi-x" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
            </svg>
        @endif
    </li>
    <div style="float: right; margin-top: 1rem !important;">
        <form action="{{action('CursoController@delete')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="id" id="id" value="{{$curso[0]->idCurso}}">
            <button type="submit" class="btn btn-danger">Eliminar curso</button>
        </form>
    </div>
</ul>
@endsection