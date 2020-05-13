@extends('layout.base')

@if(isset($curso))
    @php
        $title = 'Editar curso';
        $name = $curso[0]->nombreCurso;
        $init = $curso[0]->fechaAlta;
        $end = $curso[0]->fechaBaja;
        $active = $curso[0]->vigente;
        $action = 'CursoController@create';
    @endphp
@else
    @php
        $title = 'Crear curso';
        $name = '';
        $init = '';
        $end = '';
        $active = false;
        $action = 'CursoController@update';
    @endphp
@endif

@section('card_title')
<span>{{$title}}</span>
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
    <form action="{{action($action)}}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Nombre del curso</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$name}}" required>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">¿El curso está vigente?</label>
                @if($active)
                <input type="checkbox" class="form-control" name="active" id="active" checked>
                @else
                <input type="checkbox" class="form-control" name="active" id="active">
                @endif
            </div>
            </div>
        </div>
        <!-- TODO: Hacer modificación en el update. Que si no se recibe una fecha no hay pedo. -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Fecha inicio</label>
                    <div class='input-group date' id='datetimepicker1' name='init'>
                        <input type='text' class="form-control" name='init' id='init' placeholder="{{$init}}" required/>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class='col-md-6'>
                <div class="form-group">
                    <label class="control-label">Fecha final</label>
                    <div class='input-group date' id='datetimepicker2' name='end'>
                        <input type='text' class="form-control" name='end' id='end' placeholder="{{$init}}" required/>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="{{$title}}">
<script>
$(function () {
    $('#datetimepicker1').datetimepicker();
});
</script>
<script>
$(function () {
    $('#datetimepicker2').datetimepicker();
});
</script>
    </form>
@endsection