<div class="row" style="">
  <h1 class="text-center">{{ $post->title }}</h1>
  <br>
  <div class="text-center"><img src="/storage/{{ $post->avatar_path }}" width="40%" height="40%" style="border-radius: 10px;"></div>
  <br>
  <p class="text-center">Por <a href="{{ route('profile', $post->user) }}">{{ $post->user->name }}</a> {{ $post->created_at->diffForHumans() }}</p>
  <div class="text-center">
    <form method="GET" action="/posts/{{ $post->id }}">
      <button type="submit" class="btn btn-primary btn-lg">Ver Post</button>
    </form>
  </div>
  <br>
</div>
<hr>

