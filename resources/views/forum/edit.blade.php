@extends('forum.master')
<div class="page-header">
  <div class="container">
    <br><br><br>
    <h1 class="blog-title">{{ $thread->title }}</h1>
    <p class="lead blog-description">Editar hilo.</p>
  </div>
</div>
@section('content')
	<div class="row">
		<div class="col-sm-8 blog-main">
			<form method="POST" action="/forum/{{ $thread->canal->slug }}/{{ $thread->id }}/update">
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
@endsection