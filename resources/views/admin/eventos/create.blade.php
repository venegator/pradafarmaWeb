@extends('admin.master')

@section('content')
<div class="container">
	<div class="page-header">
		<h1>Crear un nuevo evento</h1>
	</div>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 blog-main">
			<div class="panel panel-default">
				<div class="panel-heading">
					Evento
				</div>
				<div class="panel-body">
					<form method="POST" action="/eventos/create" enctype="multipart/form-data">

						{{ csrf_field() }}

							<div class="form-group">
							    <label for="title">Título</label>
							    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
							</div>
							<div class="form-group">
							    <label for="descripcion">Descripción</label>
								{{--  <textarea id="body" name="body" class="form-control"></textarea> --}}

								<textarea name="descripcion" id="editor">
							    </textarea>
							</div>
							<div class="form-group">
		            <label for="pac-input">Localización</label>
							    <input id="pac-input" type="text" name="pac-input" class="controls" placeholder="Elige la localización.">
							    <div id="map"></div>
							    <div id="infowindow-content">
							      <span id="place-name"  class="title"></span><br>
							      Place ID <span id="place-id"></span><br>
							      <span id="place-address"></span>
							    </div>
							</div>
							<div class="form-group">
		            <label for="fecha">Fecha:</label>
		              <div class='input-group'>
		                  <input type='datetime-local' class="form-control" name="fecha" />
		                  <span class="input-group-addon">
		                      <span class="glyphicon glyphicon-calendar"></span>
		                  </span>
		              </div>
		          </div>
							<div class="form-group">
							    <label for="imagen">Imagen</label>
							    <input type="file" name="imagen">
							</div>
							<div class="form-group">
							  	<button type="submit" class="btn btn-primary">Publicar</button>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
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
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -33.8688, lng: 151.2195},
      zoom: 13
    });

    var input = document.getElementById('pac-input');

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
      map: map
    });
    marker.addListener('click', function() {
      infowindow.open(map, marker);
    });

    autocomplete.addListener('place_changed', function() {
      infowindow.close();
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        return;
      }

      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);
      }

      // Set the position of the marker using the place ID and location.
      marker.setPlace({
        placeId: place.place_id,
        location: place.geometry.location
      });
      marker.setVisible(true);

      document.getElementById('place-name').textContent = place.name;
      document.getElementById('place-id').textContent = place.place_id;
      document.getElementById('place-address').textContent =
          place.formatted_address;
      infowindow.setContent(document.getElementById('infowindow-content'));
      infowindow.open(map, marker);
    });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAgYAjnd52sU21ir5MX1hOutho4yqC9FI&libraries=places&callback=initMap" async defer></script>
@endsection