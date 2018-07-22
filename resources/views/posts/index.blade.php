@extends('layouts.master')


@section('content')

<div class="blog-header">
  <div class="container">
    <br><br><br>
    <h1 class="blog-title">Nuestro Blog</h1>
    <p class="lead blog-description">Aquí podrás enterarte de todo lo último en cuanto a salud</p>
  </div>
</div>

<div class="col-sm-8 blog-main">

  	@foreach($posts as $post)

    	@include('posts.post')

  	@endforeach

</div>

@include('layouts.sidebar')

@endsection