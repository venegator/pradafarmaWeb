@extends('admin.master')

@section('content')
<div class="container">
	<div class="page-header">
		<h1>Crear un nuevo hilo</h1>
	</div>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 blog-main">
			<div class="panel panel-default">
				<div class="panel-heading">
					Hilo
				</div>
				<div class="panel-body">
					<form method="POST" action="/admin/hilos/create">

						{{ csrf_field() }}

						<div class="form-group">
						    <label for="title">Título :</label>
						    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
						</div>
						<div class="form-group">
						  <label for="canal_id">Canal :</label>
						  <select class="form-control" id="canal_id" name="canal_id" required>
						  		<option value="">Selecciona uno...</option>
						    @foreach(App\Canal::all() as $canal)
						    	<option value="{{ $canal->id }}" {{ old('canal_id') == $canal->id ? 'selected' : '' }}>{{ $canal->name }}</option>
						    @endforeach
						  </select>
						</div>
						<div class="form-group">
						    <label for="body">Mensaje :</label>
							<textarea name="body" id="editor">{{ old('body') }}</textarea>
						</div>
						<div class="form-group">
						  	<button type="submit" class="btn btn-primary">Publicar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection