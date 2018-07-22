@extends('forum.master')

@section('head')
    <link rel="stylesheet" href="/css/vendor/jquery.atwho.css">
@endsection

<div class="page-header" style="border-color: white;">
  <div class="container">
    <br><br><br>
    <h1 class="blog-title">{{ $thread->title }}</h1>
    <h3 style="color: grey;">
    	Publicado {{ $thread->created_at->diffForHumans() }} por <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a>
    </h3>
  </div>
</div>
@section('content')
	<div class="row">
		<div class="col-md-8">
			<div class="forum-top">
				{!! $thread->body !!}
			</div>
			<hr>
			@can('update', $thread)
				<form action="/forum/{{ $thread->canal->slug }}/{{ $thread->id }}/edit" method="GET">
					{{ csrf_field() }}

					<button type="submit" class="btn btn-primary btn-block">Editar</button>
				</form>
				<form action="/forum/{{ $thread->canal->slug }}/{{ $thread->id }}" method="POST">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}

					<button type="submit" class="btn btn-danger btn-block">Eliminar</button>
				</form>
			@endcan
			<hr>
			@foreach($replies as $reply)
				<reply :attributes="{{ $reply }}" inline-template v-cloak>
				    <div id="reply-{{ $reply->id }}">
				    	<div class="respuesta" style="height: auto; min-height: 70px; align-items: flex-start; display: flex;">
			                <div class="avatar">
			                    <a href="{{ route('profile', $reply->owner->name) }}"><img src="/storage/{{ $reply->owner->avatar() }}" width="70" height="70" style="border-radius: 50px; margin-right: 20px;"></a>
			                    @can ('update', $reply)
			                    <div class="edicion" style="padding-left: 13px; padding-top: 5px;">
			                    	<button class="btn btn-xs btn-primary" @click="editing = true">Editar</button>
		                    	</div>
		                    	<div class="destruir" style="padding-left: 8px; padding-top: 5px;">
		                    		<button class="btn btn-xs btn-danger" @click="destroy">Eliminar</button>
		                    	</div>
		                    	@endcan
			                </div>
			                <div class="texto" style="width: 75%; margin-right: auto;">
			                    <h5>
				                    <a href="{{ route('profile', $reply->owner) }}">
				                        {{ $reply->owner->name }}
				                    </a> dijo {{ $reply->created_at->diffForHumans() }}...@if($reply->owner->isAdmin()) | Administrador @endif
				                </h5>
				                <div v-if="editing">
					                <div class="form-group">
					                    <textarea class="form-control" v-model="body"></textarea>
					                </div>

					                <button class="btn btn-xs btn-primary" @click="update">Actualizar</button>
					                {{-- <button class="btn btn-xs btn-link" @click="editing = false">Cancelar</button> --}}
					            </div>

					            <div v-else v-html="body"></div>
			                </div>
			                <div class="favorito text-center" style="margin-right: 10px; margin-left: auto;">
			                	{{-- 				                    <form method="POST" action="/replies/{{ $reply->id }}/favorites">
				                        {{ csrf_field() }}

				                        <button type="submit" class="btn btn-default" {{ $reply->isFavorited() ? 'disabled' : '' }}>
				                            {{ $reply->favorites_count }} {{ str_plural('Favorite', $reply->favorites_count) }}
				                        </button>
				                    </form> --}}
			                    @if (auth()->check())
			                    	<favorite :reply="{{ $reply }}"></favorite>
			                    @endif
			                </div>
		            	</div>
				    </div>
				</reply>
				<hr>
				{{--	<div class="panel panel-default">
						<div class="panel-heading">
							<div class="level">
								<h5 class="flex">
									<a href="{{ route('profile', $reply->owner) }}">
										{{ $reply->owner->name }}
									</a> dijo {{ $reply->created_at->diffForHumans() }}...
								</h5>
								<div>
									<form method="POST" action="/replies/{{ $reply->id }}/favorites">
										{{ csrf_field() }}

										<button type="submit" class="btn btn-default" {{ $reply->isFavorited() ? 'disabled' : ''}}>
											{{ $reply->favorites_count }} {{ str_plural('Like', $reply->favorites_count) }}
										</button>
									</form>
								</div>
							</div>	
						</div>
						<div class="panel-body">{{ $reply->body }}</div>
						@can ('update', $reply)
					        <div class="panel-footer level">
					        	
						        	<form method="POST" action="/replies/{{ $reply->id }}">
						                {{ csrf_field() }}
						                {{ method_field('DELETE') }}

						                <button type="submit" class="btn btn-danger btn-xs mr-1">Eliminar</button>
						            </form>
									<a href="#collapse{{ $reply->id }}" class="btn btn-primary btn-xs mr-1" data-toggle="collapse">Editar</a>
									
									  <div id="collapse{{ $reply->id }}" class="collapse" style="width: 100%;">
									    <form method="POST" action="/replies/update/{{ $reply->id }}">

											{{ csrf_field() }}
											{{ method_field('PATCH') }}

												<div class="form-group">
													<textarea id="body" name="body" class="form-control" rows="5" required>{{ $reply->body }}</textarea>
												</div>
												<div class="form-group">
												  	<button type="submit" class="btn btn-xs">Guardar cambios</button>
												</div>
										</form>
									  </div>

					        </div>
					    @endcan
					</div>--}}
			@endforeach  

			<div class="text-center">
				{{ $replies->links() }}
			</div>

			@if(auth()->check())
				<div class="comentario" style="height: auto;">
					<div class="user-image is-hidden-mobile" style="float: left; width: 12%;">
						<a href="{{ route('profile', auth()->user()->name) }}"><img src="/storage/{{ auth()->user()->avatar() }}" width="70" height="70" style="border-radius: 50px;"></a>
					</div>
					<div class="texto" style="display: inline-block; height: auto; width: 88%;">
						<form method="POST" action="/forum/{{ $thread->canal->slug }}/{{ $thread->id }}/replies">
							{{ csrf_field() }}
							<div class="form-group">
								<textarea name="body" id="body" class="form-control" placeholder="Deja tu comentario..." rows="5"></textarea>
								<br>
								<button type="submit" class="btn btn-default">Publicar</button>
							</div>
						</form>
					</div>
				</div>
			@else
				<p class="text-center">Por favor, <a href="{{ route('login') }}">inicia sesión</a> o <a href="{{ route('register') }}">regístrate</a> para participar en ésta conversación.</p>
			@endif

		</div>
		@include('forum.sidebar')
		{{--<div class="col-md-3">
											<div class="profile-header-container">   
									    		<div class="profile-header-img">
									                <img class="img-circle" src="/storage/{{ $thread->creator->avatar() }}" />
									                <!-- badge -->
									                <div class="rank-label-container">
									                    <span class="label label-default rank-label" style="font-size: 15px;">{{ $thread->creator->name }}</span>
									                </div>
									            </div>
									            <br>
										        <form method="GET" action="/profiles/{{ $thread->creator->name }}">
												    <button type="submit" class="btn btn-info btn-block" style="background-color: rgba(97, 158, 167, 1); border-color: rgba(97, 158, 167, 1);">Ver perfil</button>
												</form>
									        </div> 
										</div>--}}
	</div>
@endsection