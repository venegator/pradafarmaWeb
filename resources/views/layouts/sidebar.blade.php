<div class="col-sm-3 col-sm-offset-1">
  @can('create', App\Post::class)
    <form method="GET" action="/posts/create">
        <button type="submit" class="btn btn-primary btn-block">Crear post</button>
    </form>
    <br>
  @endcan
  <div class="sidebar-module sidebar-module-inset">
    <h4 class="text-center">Sobre nuestro blog</h4>
    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
  </div>
  <br>
  <div class="sidebar-module">
    <h4 class="text-center">Archivos</h4>
    <ol class="list-unstyled">
      @foreach($archives as $stats)
        <li>
          <a href="/posts/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
          {{ $stats['month'] . ' ' . $stats['year'] }}
        </a>
        </li>
      @endforeach
    </ol>
  </div>
</div>