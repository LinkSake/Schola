@extends('layout.base')

@section('card_title')
<span>Detalle curso</span>
@endsection

@section('content')
    <form action="{{action('CursoController@create')}}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Nombre del curso</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">¿El curso está vigente?</label>
                <input type="checkbox" class="form-control" name="active" id="active">
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Fecha inicio</label>
                    <div class='input-group date' id='datetimepicker1' name='init'>
                        <input type='text' class="form-control" name='init' id='init'/>
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
                        <input type='text' class="form-control" name='end' id='end'/>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Crear curso">
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