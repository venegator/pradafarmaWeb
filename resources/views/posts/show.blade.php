@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="jumbotron text-center" style="background-image: url('/storage/{{ $post->avatar_path }}');
		background-attachment: fixed;
 		background-position: center;
 		background-repeat: no-repeat;
 		background-size: cover;">
			<h2 style="color: white;">{{ $post->title }}</h2>
		</div>
	</div>
</div>
<div class="row">
		<div class="col-sm-10 col-sm-offset-1">

		@can('edit', $post)
			<form method="GET" action="/posts/{{ $post->id }}/edit">
			    <button type="submit" class="btn btn-primary btn-block">Editar este post</button>
			</form>
			<br>
		@endcan
		@can('delete', $post)
			<form action="/posts/{{ $post->id }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}

				<button type="submit" class="btn btn-danger btn-block">Eliminar</button>
			</form>
			<br>
		@endcan

		<div class="text-center"><img src="/storage/{{ $post->avatar_path }}" width="60%" height="60%" style="border-radius: 10px;"></div>
		<br>
		{!! $post->body !!}

		<hr>
		<h1 class="text-center">Compártelo</h1>
		<div class="row">
			<div class="container text-center">
	          <div class="col-xs-2 col-sm-2 col-xs-offset-2 col-md-offset-2">
	            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" class="btn btn-lg btn-block onl_btn-facebook" title="Facebook" target="_blank" style="color: white;">
	              <i class="fa fa-facebook fa-2x"></i>
	              <span class="hidden-xs"></span>
	            </a>
	          </div>
	          <div class="col-xs-2 col-sm-2">
	            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" class="btn btn-lg btn-block onl_btn-twitter" title="Twitter" target="_blank" style="color: white;">
	              <i class="fa fa-twitter fa-2x"></i>
	              <span class="hidden-xs"></span>
	            </a>
	          </div>  
	          <div class="col-xs-2 col-sm-2">
	            <a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl()) }}" class="btn btn-lg btn-block onl_btn-google-plus" title="Google Plus" target="_blank" style="color: white;">
	              <i class="fa fa-google-plus fa-2x"></i>
	              <span class="hidden-xs"></span>
	            </a>
	          </div>
	        </div> 
	    </div>
		<hr>
		<div id="disqus_thread"></div>
		<script>

		/**
		*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
		*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
		/*
		var disqus_config = function () {
		this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
		this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
		};
		*/
		(function() { // DON'T EDIT BELOW THIS LINE
		var d = document, s = d.createElement('script');
		s.src = 'https://pradafarma.disqus.com/embed.js';
		s.setAttribute('data-timestamp', +new Date());
		(d.head || d.body).appendChild(s);
		})();
		</script>
		<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
{{-- 
		<div class="card">
			<div class="card-block">
				<form method="POST" action="/posts/{{ $post->id }}/comments">
					{{ csrf_field() }}
					<div class="form-group">
						<textarea name="body" placeholder="Your comment here." class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Add Comment</button>
					</div>
				</form>

				@include('layouts.errors')
			</div>
		</div>
 --}}
	</div>
</div>
@endsection