@extends('layouts.master')

@section('content')


	<div class="col-sm-10 col-sm-offset-1">
		<h1>Crear un post</h1>

		<hr>

		<form method="POST" action="/posts" enctype="multipart/form-data">

			{{ csrf_field() }}

				<div class="form-group">
				    <label for="title">Titulo :</label>
				    <input type="text" class="form-control" id="title" name="title">
				</div>
				<div class="form-group">
				    <label for="body">Cuerpo :</label>
					{{--  <textarea id="body" name="body" class="form-control"></textarea> --}}

					<textarea name="body" id="editor">
				    </textarea>
				</div>
				<div class="form-group">
				    <label for="imagen">Imagen</label>
				    <input type="file" name="imagen">
				</div>
				<div class="form-group">
				  	<button type="submit" class="btn btn-primary">Publicar</button>
				</div>
				@include('layouts.errors')
		</form>

	</div>

@endsection 