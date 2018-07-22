@extends('layouts.master')

@section('content')


	<div class="col-sm-10 col-sm-offset-1">
		<h1>Editar Post</h1>

		<br>
		
			<form method="POST" action="/posts/{{ $post->id }}" enctype="multipart/form-data">

				{{ csrf_field() }}
				{{ method_field('PATCH') }}

					<div class="form-group">
					    <label for="title">Título :</label>
					    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
					</div>
					<div class="form-group">
						<label for="title">Cuerpo :</label>
						<textarea name="body" id="editor">{!! $post->body !!}</textarea>
					</div>
					<div class="form-group">
					    <label for="imagen">Imagen</label>
					    <input type="file" name="imagen">
					</div>
					<div class="form-group">
					  	<button type="submit" class="btn btn-primary">Guardar cambios</button>
					</div>
			</form>

	</div>

@endsection 