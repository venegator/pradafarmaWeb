@extends('admin.master')

@section('content')
<div class="container">
	<div class="page-header">
		<h1>Crear un nuevo post</h1>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Post
				</div>
				<div class="panel-body">
					<form method="POST" action="/admin/posts/create" enctype="multipart/form-data">

						{{ csrf_field() }}

						<div class="form-group">
						    <label for="title">Title :</label>
						    <input type="text" class="form-control" id="title" name="title">
						</div>
						<div class="form-group">
						    <label for="body">Body :</label>
							{{--  <textarea id="body" name="body" class="form-control"></textarea> --}}

							<textarea name="body" id="editor">
						    </textarea>
						</div>
						<div class="form-group">
						    <label for="imagen">Imagen</label>
						    <input type="file" name="imagen">
						</div>
						<div class="form-group">
						  	<button type="submit" class="btn btn-primary">Publish</button>
						</div>
						@include('layouts.errors')
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection