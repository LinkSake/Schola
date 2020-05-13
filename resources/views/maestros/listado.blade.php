@extends('layout.base')

@section('card_title')
<span>Listado de maestros</span>
<div style="float: right;">
<a href="{{ url('maestro/nuevo') }}" style="color: white;">
    <span style="margin-right: .5 rem;">+ Nuevo maestro</span>
</a>
<span style="mr-1 ml-1"> | </span>
<a href="{{ url('/') }}" style="color: white;">
    <svg class="bi bi-house-door-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M6.5 10.995V14.5a.5.5 0 01-.5.5H2a.5.5 0 01-.5-.5v-7a.5.5 0 01.146-.354l6-6a.5.5 0 01.708 0l6 6a.5.5 0 01.146.354v7a.5.5 0 01-.5.5h-4a.5.5 0 01-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
        <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/>
    </svg>
</a>
</div>
@endsection

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Matricula</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido paterno</th>
      <th scope="col">Apellido materno</th>
      <th scope="col">CURP</th>
      <th scope="col">Grado Academico</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($maestros as $maestro)
        <tr>
        <th scope="row">{{$maestro->idMaestro}}</th>
        <td>{{$maestro->matricula}}</td>
        <td>{{$maestro->nombre}}</td>
        <td>{{$maestro->paterno}}</td>
        <td>{{$maestro->materno}}</td>
        <td>{{$maestro->curp}}</td>
        <td>
            @foreach($grados as $grado)
                @if($maestro->idGradoAca == $grado->idGradoAca)
                    {{$grado->gradoAcademico}}
                @endif
            @endforeach
        </td>
        <td>
            <a href="{{ url('maestro/editar/'.$maestro->idMaestro) }}">
                <svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z" clip-rule="evenodd"/>
                </svg>
            </a>
        </td>
        <td>
            <a href="{{ url('maestro/eliminar/'.$maestro->idMaestro) }}">
                <svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 00-1 1v1a1 1 0 001 1H3v9a2 2 0 002 2h6a2 2 0 002-2V4h.5a1 1 0 001-1V2a1 1 0 00-1-1H10a1 1 0 00-1-1H7a1 1 0 00-1 1H2.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM8 5a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 018 5zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"/>
                </svg>
            </a>
        </td>
        </tr>
    @endforeach
  </tbody>
</table>
@endsection