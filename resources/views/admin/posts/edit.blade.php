@extends('admin.master')

@section('content')
<div class="container">
	<div class="page-header">
		<h1>Editar post</h1>
	</div>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 blog-main">
			<div class="panel panel-default">
				<div class="panel-heading">
					Post
				</div>
				<div class="panel-body">
					<form method="POST" action="/admin/posts/{{ $post->id }}/update" enctype="multipart/form-data">

						{{ csrf_field() }}
						{{ method_field('PATCH') }}

						<div class="form-group">
						    <label for="title">Título :</label>
						    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
						</div>
						<div class="form-group">
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
			</div>
		</div>
	</div>
</div>
@endsection