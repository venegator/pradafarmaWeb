@extends('layouts.master')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="page-header">
            <h1>
                <img src="/storage/{{ $profileUser->avatar() }}" width="100" height="100" style="border-radius: 50px; margin-right: 20px; margin-left: 20px;">
                {{ $profileUser->name }}
                <small>Registrado desde {{ $profileUser->created_at->diffForHumans() }}</small>
            </h1>

            @can('update', $profileUser)
                
                <a href="#collapseCambiarFoto" class="btn btn-primary btn-sm" data-toggle="collapse">Cambiar foto de perfil</a>
                                   
                <div id="collapseCambiarFoto" class="collapse" style="width: 100%;">
                    <br>
                    <form method="POST" action="{{ route('avatar', $profileUser) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="file" name="avatar">
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm">Guardar cambios</button>
                    </form>
                </div>
            @endcan

        </div>
        @if(auth()->check() && auth()->user()->isAdmin())
            <h1>Posts</h1>
            <hr>
            @forelse ($posts as $post)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </div>

                    <div class="panel-body">
                        {!! $post->body !!}
                    </div>
                </div>
            @empty
                <p class="text-center">El usuario no ha subido ningún post.</p>
            @endforelse
        @endif

        <h1>Hilos</h1>
        <hr>
        @forelse ($threads as $thread)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="level">
                        <span class="flex">
                            <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a> dijo:
                            <a href="/forum/{{ $thread->canal->slug }}/{{ $thread->id }}">{{ $thread->title }}</a>
                        </span>

                        <span>{{ $thread->created_at->diffForHumans() }}</span>
                    </div>
                </div>

                <div class="panel-body">
                    {!! $thread->body !!}
                </div>
            </div>
        @empty
            <p class="text-center">El usuario no ha creado ningún hilo.</p>
        @endforelse

        <h1>Participaciones en el foro</h1>
        <hr>
        @forelse ($replies as $reply)
            <div id="reply-{{ $reply->id }}" class="panel panel-default">
                <div class="panel-heading">
                    <div class="level">
                        <h5 class="flex">
                            <a href="{{ route('profile', $reply->owner) }}">
                                {{ $reply->owner->name }}
                            </a> comentó en el hilo 
                            <a href="/forum/{{ $reply->thread->canal->slug }}/{{ $reply->thread->id }}">{{ $reply->thread->title }}</a> {{ $reply->created_at->diffForHumans() }}
                        </h5>
                    </div>
                </div>

                <div class="panel-body">
                    {!! $reply->body !!}
                </div>

            </div>
        @empty
            <p class="text-center">El usuario no ha creado ningún hilo.</p>
        @endforelse

        <h1>Eventos a los que asistirá</h1>
        <hr>
        @forelse ($visitas as $visita)
        <div class="col-sm-6 col-md-4 text-center">
            <div class="thumbnail">
                <img src="/storage/{{ $visita->evento->avatar_path }}" width="100%" height="100">
                <div class="caption">
                    <h3>{{ $visita->evento->title }}</h3>
                    <p><span class="glyphicon glyphicon-map-marker"></span> {{ $visita->evento->pac_input }}</p>
                    <p><span class="glyphicon glyphicon-time"></span> {{ $visita->evento->fecha }}</p>
                    <p><a href="/eventos/{{ $visita->evento->id }}" class="btn btn-primary" role="button">Infórmate.</a></p>
                </div>
            </div>
        </div>
        @empty
            <p class="text-center">El usuario no asistirá a ningun evento.</p>
        @endforelse
    </div>
@endsection