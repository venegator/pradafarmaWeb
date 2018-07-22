@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="jumbotron text-center" style="background-image: url('/storage/{{ $evento->avatar_path }}');
		background-attachment: fixed;
 		background-position: center;
 		background-repeat: no-repeat;
 		background-size: cover;">
			<h1 style="color: white">{{ $evento->title }}</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-8">
			<h1>Descripción</h1>
			<hr>
			<div class="text-center"><img src="/storage/{{ $evento->avatar_path }}" width="60%" height="60%"></div>
			<p>{!! $evento->descripcion !!}</p>
		</div>
		<div class="col-md-4">
			@can('update', $evento)
			<a href="/eventos/{{ $evento->id }}/edit" class="btn btn-primary btn-block" role="button">Editar</a>
			<br>
			@endcan
			@can('delete', $evento)
			<form action="/eventos/{{ $evento->id }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}

				<button type="submit" class="btn btn-danger btn-block">Eliminar</button>
			</form>
			@endcan
			<h1 class="text-center">@if ($evento->visitas_count > 1 || $evento->visitas_count < 1) Asistirán @else Asistirá @endif {{ $evento->visitas_count }} {{ str_plural('persona', $evento->visitas_count) }}</h1>
			<hr>
			@if(auth()->check())
				@if(!$evento->isVisitado())
					<form method="POST" action="/eventos/{{ $evento->id }}/visitar">
		                {{ csrf_field() }}

		                <button type="submit" class="btn btn-primary btn-block">Asistiré</button>
		            </form>
		        @else
		        	<form method="POST" action="/eventos/{{ $evento->id }}/novisitar">
		                {{ csrf_field() }}
		                {{ method_field('DELETE') }}

		                <button type="submit" class="btn btn-info btn-block">No asistiré</button>
		            </form>
	       		 @endif
	       		 <br>
	       	@endif
			@foreach($evento->visitas as $visita)
	       		<img src="/storage/{{ $visita->owner->avatar() }}" style="border-radius: 50%; margin-right: 10px; margin-bottom: 10px;" width="70px" height="70px">
	       	@endforeach
		</div>
	</div>
	<div class="row"><h1>Localización: {{ $evento->pac_input }} <span class="glyphicon glyphicon-map-marker"></span></h1></div>
	<div>
		<input type="hidden" id="pac-input" class="controls" value="{{ $evento->pac_input }}">
		<div id="map"></div>	
	</div>
    <script>
      // This sample uses the Place Autocomplete widget to allow the user to search
      // for and select a place. The sample then displays an info window containing
      // the place ID and other information about the place that the user has
      // selected.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var address = document.getElementById('pac-input').value;
        var geocoder = new google.maps.Geocoder();
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });
        geocoder.geocode( { 'address': address}, function(results, status) {
		      if (status == 'OK') {
		        map.setCenter(results[0].geometry.location);
		        var marker = new google.maps.Marker({
		            map: map,
		            position: results[0].geometry.location
		        });
		      } else {
		        alert('Geocode was not successful for the following reason: ' + status);
		      }
		    });
		}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAgYAjnd52sU21ir5MX1hOutho4yqC9FI&libraries=places&callback=initMap" async defer></script>
@endsection