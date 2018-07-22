@extends('admin.master')

@section('content')
<div class="container">
	<div class="page-header">
		<h1>Posts</h1>
	</div>
	<div class="col-md-6 col-md-offset-3">
		<form method="GET" action="/admin/posts/create">
	    	<button type="submit" class="btn btn-primary btn-block">Crear un nuevo post</button>
		</form>
		<br>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<input class="form-control" id="postsInput" type="text" placeholder="Search..">
			<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>Titulo</th>       
			        <th>Creador</th>
			        <th>Fecha de Publicación</th>
			        <th>Opciones</th>
			      </tr>
			    </thead>
			    <tbody id="postsTable">
			      @foreach($posts as $post)
			      <tr>
			      	<td class="text"><span>{{ $post->title }}</span></td>
			      	<td>{{ $post->user->name }}</td>
			      	<td>{{ $post->created_at->format('d/m/Y') }}</td>
			      	<td>
			      		<form method="GET" action="/posts/{{ $post->id }}">
						  {{ csrf_field() }}

						  <button type="submit" class="btn btn-primary btn-xs mr-1" style="display: inline-block; float: left;">Ver post</button>
						</form>
	      				<form method="GET" action="/admin/posts/{{ $post->id }}/edit">
						  {{ csrf_field() }}

						  <button type="submit" class="btn btn-info btn-xs mr-1" style="display: inline-block; float: left;">Editar</button>
						</form>
						<form method="POST" action="/admin/posts/{{ $post->id }}">
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
  $("#postsInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#postsTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection