@extends('admin.master')

@section('content')
<div class="container">
	<div class="page-header">
		<h1>Eventos</h1>
	</div>
	<div class="col-md-6 col-md-offset-3">
		<form method="GET" action="/admin/eventos/create">
	    	<button type="submit" class="btn btn-primary btn-block">Crear un nuevo evento</button>
		</form>
		<br>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<input class="form-control" id="eventosInput" type="text" placeholder="Buscar..">
			<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>Titulo</th>
			        <th>Dirección</th>        
			        <th>Fecha</th>
			        <th>Opciones</th>
			      </tr>
			    </thead>
			    <tbody id="eventosTable">
			      @foreach($eventos as $evento)
			      <tr>
			      	<td class="text"><span>{{ $evento->title }}</span></td>
			      	<td>{{ $evento->pac_input }}</td>
			      	<td>{{ $evento->fecha }}</td>
			      	<td>
			      		<form method="GET" action="/eventos/{{ $evento->id }}">
						  {{ csrf_field() }}

						  <button type="submit" class="btn btn-primary btn-xs mr-1" style="display: inline-block; float: left;">Ver evento</button>
						</form>
	      				<form method="GET" action="/admin/eventos/{{ $evento->id }}/edit">
						  {{ csrf_field() }}

						  <button type="submit" class="btn btn-info btn-xs mr-1" style="display: inline-block; float: left;">Editar</button>
						</form>
						<form method="POST" action="/admin/eventos/{{ $evento->id }}">
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
	</div>
</div>
<script>
$(document).ready(function(){
  $("#eventosInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#eventosTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection