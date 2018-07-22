@extends('admin.master')

@section('content')
<div class="container">
	<div class="page-header">
		<h1>Usuarios</h1>
	</div>
	<div class="col-md-6 col-md-offset-3">
		<form method="GET" action="/admin/users/create">
	    	<button type="submit" class="btn btn-primary btn-block">Crear un nuevo usuario</button>
		</form>
		<br>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<input class="form-control" id="usersInput" type="text" placeholder="Buscar..">
			<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>Nombre</th>
			        <th>E-mail</th>        
			        <th>Rol</th>
			        <th>Opciones</th>
			      </tr>
			    </thead>
			    <tbody id="usersTable">
			      @foreach($users as $user)
			      <tr>
			      	<td>{{ $user->name }}</td>
			      	<td>{{ $user->email }}</td>
			      	<td>{{ $user->rol }}</td>
			      
			      	<td>
			      		<form method="GET" action="/profiles/{{ $user->name }}">
						  {{ csrf_field() }}

						  <button type="submit" class="btn btn-primary btn-xs mr-1" style="display: inline-block; float: left;">Ver perfil</button>
						</form>
	      				<form method="GET" action="/admin/users/{{ $user->name }}/edit">
						  {{ csrf_field() }}

						  <button type="submit" class="btn btn-info btn-xs mr-1" style="display: inline-block; float: left;">Editar</button>
						</form>
						<form method="POST" action="/admin/users/{{ $user->name }}">
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
  $("#usersInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#usersTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection
