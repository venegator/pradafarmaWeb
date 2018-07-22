@extends('admin.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1>Citas</h1>
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
          <td>{{ $cita->fecha }}</td>
          <td>{{ $cita->servicio }}</td>
          <td>{{ $cita->apellidos }}</td>
          <td>{{ $cita->name }}</td>
          <td>{{ $cita->observaciones }}</td>
          <td>
            <form method="GET" action="/admin/citas/{{ $cita->id }}/edit">
              {{ csrf_field() }}

              <button type="submit" class="btn btn-info btn-xs mr-1" style="display: inline-block; float: left;">Editar</button>
            </form>
            <form method="POST" action="/admin/citas/{{ $cita->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" class="btn btn-danger btn-xs" style="display: inline-block; float: left;">Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
    <div class="col-sm-3">
  <a href="/admin/citas/create" class="btn btn-info btn-block" role="button">Crear Cita</a>
  <br>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="text-center">Filtrar</h3>
    </div>
    <div class="panel-body">
      <a href="/admin/citas" class="btn btn-primary btn-block" role="button">Sin filtro</a>
      <a href="/admin/citas?nutri=1" class="btn btn-primary btn-block" role="button">Nutricionista</a>
      <a href="/admin/citas?pielr=1" class="btn btn-primary btn-block" role="button">Análisis de piel rápido</a>
      <a href="/admin/citas?piel=1" class="btn btn-primary btn-block" role="button">Análisis de piel con informe</a>
      <a href="/admin/citas?capilar=1" class="btn btn-primary btn-block" role="button">Análisis capilar</a>
      <a href="/admin/citas?pedi=1" class="btn btn-primary btn-block" role="button">Identificación pedicular</a>
      <a href="/admin/citas?celu=1" class="btn btn-primary btn-block" role="button">Análisis celulitis</a>
      <a href="/admin/citas?cabina=1" class="btn btn-primary btn-block" role="button">Tratamiento en cabina</a>
      <a href="/admin/citas?sangui=11" class="btn btn-primary btn-block" role="button">Grupo sanguíneo</a>
      <a href="/admin/citas?hipi=1" class="btn btn-primary btn-block" role="button">Perfil hipídico</a>
    </div>
  </div>
</div>
  </div>
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