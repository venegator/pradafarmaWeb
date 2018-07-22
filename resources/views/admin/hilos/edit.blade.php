@extends('admin.master')

@section('content')
<div class="container">
	<div class="page-header">
		<h1>Editar hilo</h1>
	</div>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 blog-main">
			<div class="panel panel-default">
				<div class="panel-heading">
					Hilo
				</div>
				<div class="panel-body">
					<form method="POST" action="/admin/hilos/{{ $thread->canal->slug }}/{{ $thread->id }}/update">
						{{ csrf_field() }}
						{{ method_field('PATCH') }}

							<div class="form-group">
							    <label for="title">Título :</label>
							    <input type="text" class="form-control" id="title" name="title" value="{{ $thread->title }}" required>
							</div>
							<div class="form-group">
							  <label for="canal_id">Canal :</label>
							  <select class="form-control" id="canal_id" name="canal_id" required>
							  		<option value="">Selecciona uno...</option>
							    @foreach(App\Canal::all() as $canal)
							    	<option value="{{ $canal->id }}" {{ $thread->canal_id == $canal->id ? 'selected' : '' }}>{{ $canal->name }}</option>
							    @endforeach
							  </select>
							</div>
							<div class="form-group">
							    <label for="body">Mensaje :</label>
								<textarea name="body" id="editor">{!! $thread->body !!}</textarea>
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