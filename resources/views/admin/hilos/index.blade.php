@extends('admin.master')

@section('content')
<div class="container">
	<div class="page-header">
		<h1>Hilos</h1>
	</div>
	<div class="col-md-6 col-md-offset-3">
		<form method="GET" action="/admin/hilos/create">
	    	<button type="submit" class="btn btn-primary btn-block">Crear un nuevo hilo</button>
		</form>
		<br>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<input class="form-control" id="hilosInput" type="text" placeholder="Buscar..">
			<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>Titulo</th>
			        <th>Canal</th>        
			        <th>Creador</th>
			        <th>Fecha de Publicación</th>
			        <th>Opciones</th>
			      </tr>
			    </thead>
			    <tbody id="hilosTable">
			      @foreach($threads as $thread)
			      <tr>
			      	<td class="text"><span>{{ $thread->title }}</span></td>
			      	<td>{{ $thread->canal->name }}</td>
			      	<td>{{ $thread->creator->name }}</td>
			      	<td>{{ $thread->created_at->format('d/m/Y') }}</td>
			      	<td>
			      		<form method="GET" action="/forum/{{ $thread->canal->slug }}/{{ $thread->id }}">
						  {{ csrf_field() }}

						  <button type="submit" class="btn btn-primary btn-xs mr-1" style="display: inline-block; float: left;">Ver hilo</button>
						</form>
	      				<form method="GET" action="/admin/hilos/{{ $thread->canal->slug }}/{{ $thread->id }}/edit">
						  {{ csrf_field() }}

						  <button type="submit" class="btn btn-info btn-xs mr-1" style="display: inline-block; float: left;">Editar</button>
						</form>
						<form method="POST" action="/admin/hilos/{{ $thread->canal->slug }}/{{ $thread->id }}">
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
  $("#hilosInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#hilosTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection