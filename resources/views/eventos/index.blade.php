@extends('layouts.master')
@section('content')
<div class="page-header">
  <div class="container">
    <h1 class="blog-title">Eventos</h1>
    <p class="lead blog-description">Únete a nosotros y ven a nuestros eventos</p>
  </div>
</div>
@can('create', App\Eventos::class)
	<form method="GET" action="/eventos/create">
	    <button type="submit" class="btn btn-primary btn-block">Crear evento</button>
	</form>
<br>
  @endcan
<div class="col-md-12">
	@foreach($eventos as $evento)
	  <div class="col-sm-4 col-md-4 text-center">
	    <div class="thumbnail">
	      <img src="/storage/{{ $evento->avatar_path }}" width="100%" height="100%">
	      <div class="caption">
	        <h3>{{ $evento->title }}</h3>
	        <p><span class="glyphicon glyphicon-map-marker"></span> {{ $evento->pac_input }}</p>
	        <p><span class="glyphicon glyphicon-time"></span> {{ $evento->fecha }}</p>
	        <p><a href="/eventos/{{ $evento->id }}" class="btn btn-primary" role="button">Infórmate</a></p>
	      </div>
	    </div>
	  </div>
	@endforeach
</div>
@endsection