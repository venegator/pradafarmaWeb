@extends('forum.master')
@section('content')
<div class="page-header">
  <div class="container">
    <br><br><br>
    <h1 class="blog-title">Citas</h1>
    <p class="lead blog-description">Gestiona las citas de la farmacia.</p>
  </div>
</div>
<div class="row">
	<div class="col-sm-9">
    <input class="form-control" id="citasInput" type="text" placeholder="Buscar..">
		<table class="table table-hover"> 
    <thead>
      <tr>
        <th>Fecha</th>
        <th>Especialidad</th>        
        <th>Apellidos</th>
        <th>Nombre</th>
        <th>Observaciones</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody id="citasTable">
      @foreach($citas as $cita)
      <tr>
      	<td>{{ $cita->fecha->format('d/m/Y H:i') }}</td>
      	<td>{{ $cita->servicio }}</td>
      	<td>{{ $cita->apellidos }}</td>
      	<td>{{ $cita->name }}</td>
      	<td>{{ $cita->observaciones }}</td>
      	<td>
          <form method="GET" action="/citas/{{ $cita->id }}/edit">
            {{ csrf_field() }}

            <button type="submit" class="btn btn-info btn-xs mr-1" style="display: inline-block; float: left;">Editar</button>
          </form>
          <form method="POST" action="/citas/{{ $cita->id }}">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}

              <button type="submit" class="btn btn-danger btn-xs">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
	</div>
  @include('citas.sidebar')
</div>
<script>
$(document).ready(function(){
  $("#citasInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#citasTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection