@extends('forum.master')

@section('content')
<div class="page-header">
  <div class="container">
    <br><br><br>
    <h1 class="blog-title">Nuestro foro</h1>
    <p class="lead blog-description">Aquí podrás resolver tus dudas.</p>
  </div>
</div>

<div class="row">
	@if(auth()->check())
	<form method="GET" action="/forum/create">
	    <button type="submit" class="btn btn-primary btn-block">Crear un nuevo hilo</button>
	</form>
    <br>

	<br><br>

	@else

	<p class="text-center">Por favor, <a href="{{ route('login') }}">inicia sesión</a> o <a href="{{ route('register') }}">regístrate</a> si quieres crear un nuevo hilo</p>

	<br><br>
	@endif
	<div class="col-md-8">
        @forelse ($threads as $thread)
            <div class="hilo" style="height: auto; min-height: 70px; align-items: center; display: flex;">
                <div class="avatar">
                    <a href="{{ route('profile', $thread->creator->name) }}"><img src="/storage/{{ $thread->creator->avatar() }}" width="70" height="70" style="border-radius: 50px; margin-right: 20px; margin-left: 10px;"></a>
                </div>
                <div class="texto" style="width: 75%; margin-right: auto;">
                    <h4>
                    <a href="/forum/{{ $thread->canal->slug }}/{{ $thread->id }}">{{ $thread->title }}</a>
                    </h4>
                    <h5 style="color: grey;">
                        <a href="/forum/{{ $thread->canal->slug }}">{{ $thread->canal->name }}</a> · Publicado por <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a> {{ $thread->created_at->diffForHumans() }}
                    </h5>
                </div>
                <div class="contador text-center" style="margin-right: 10px; margin-left: auto;">
                    <h3 style="display: inline-block; color: grey;">{{ $thread->replies_count }}</h3>  <span class="glyphicon glyphicon-comment" style="color: grey;"></span>
                </div>
            </div>
            <hr>
        @empty
            <p>No existen resultados para la búsqueda deseada.</p>
        @endforelse
        <div class="text-center">
            {{ $threads->render() }}
        </div>
    </div>
	@include('forum.sidebar')
</div>
@endsection