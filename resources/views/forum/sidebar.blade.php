<div class="col-md-4">
	<h3 class="text-center">Selecciona un filtro</h3>
	<a href="/forum" class="btn btn-primary btn-block" role="button">Todos los hilos</a>

	@if(auth()->check())
		<a href="/forum?by={{ auth()->user()->name }}" class="btn btn-primary btn-block" role="button">Hilos creados por mi</a>
	@endif

	<a href="/forum?popular=1" class="btn btn-primary btn-block" role="button">Los más populares</a>

	<h3 class="text-center">O selecciona un canal</h3>

	<div class="list-group">
	  	@foreach(App\Canal::all() as $canal)
			<a href="/forum/{{ $canal->slug }}" class="list-group-item list-group-item-action text-center">{{ $canal->name }}</a>
		@endforeach
	</div>
	<hr>
	@if(auth()->check() && auth()->user()->isAdmin())
		<a href="#collapseCreateCanal" class="btn btn-primary btn-block" data-toggle="collapse" style="margin-bottom: 5px;">Crear canal</a>
	                                    
	    <div id="collapseCreateCanal" class="collapse" style="width: 100%;">
	        <form method="POST" action="/forum/createCanal">
	            {{ csrf_field() }}

	                <div class="form-group">
	                    <label for="name">Nombre :</label>
	                    <input type="text" class="form-control" id="name" name="name" required>
	                </div>
	                <div class="form-group">
	                    <button type="submit" class="btn btn-default">Crear</button>
	                </div>
	        </form>
	    </div>
	    <a href="#collapseDestroyCanal" class="btn btn-danger btn-block" data-toggle="collapse">Eliminar canal</a>
	                                    
	    <div id="collapseDestroyCanal" class="collapse" style="width: 100%;">
	        <form method="POST" action="/forum/destroyCanal">
	            {{ csrf_field() }}
	            {{ method_field('DELETE') }}

	                <div class="form-group">
	                    <label for="canal_id"></label>
	                        <select class="form-control" id="canal_id" name="canal_id" required>
	                            <option value="">Selecciona uno...</option>
	                        @foreach(App\Canal::all() as $canal)
	                            <option value="{{ $canal->id }}">{{ $canal->name }}</option>
	                        @endforeach
	                        </select>
	                    </div>
	                <div class="form-group">
	                    <button type="submit" class="btn btn-default">Eliminar</button>
	                </div>
	        </form>
	    </div>
    @endif
</div>