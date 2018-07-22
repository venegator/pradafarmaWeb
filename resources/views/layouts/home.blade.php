<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pradafarma</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https:////maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/0.11.1/trix.css">
    <!-- Custom styles for this template -->
    <style>
  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
  h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;      
      font-size: 20px;
      color: #111;
  }
  .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 11px !important;
      letter-spacing: 4px;
      opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  .open .dropdown-toggle {
      color: #2d2d30;
      background-color: #2d2d30 !important;
  }
  .dropdown-menu li a {
      color: #111 !important;
  }
  .dropdown-menu li a:hover {
      color: #white !important;
      background-color: #2d2d30 !important;
  }
  .container {
      padding: 80px 120px;
  }
  .person {
      border: 10px solid transparent;
      margin-bottom: 25px;
      width: 80%;
      height: 80%;
      opacity: 0.7;
  }
  .person:hover {
      border-color: #f1f1f1;
  }
  .carousel-inner img { 
      width: 100%; /* Set width to 100% */
      margin: auto;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
      background: #2d2d30;
      color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}

  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail p {
      margin-top: 15px;
      color: #555;
  }
  #googleMap {
      width: 100%;
      height: 400px;
  }
  footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 32px;
  }
  footer a {
      color: #f5f5f5;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }  
  textarea {
      resize: none;
  }
  .alert {
    margin-top: 50px;
    margin-bottom: 0px;
    width: 100%;
    opacity: 1;
    transition: opacity 0.6s;
  }

  .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
  }

  .closebtn:hover {
      color: black;
  }
  .social {
    display:inline-block;
    width:40px;
    height:40px;
    margin:0 10px;
    line-height:40px;
    font-size:20px;
    text-align:center;
    color:#2d2d32;
    border:1px solid;
    border-radius:50%;
    background:#fff;
    overflow:hidden;
    transition:color .3s;
  }
  .social:hover {color: #d9534f;cursor: pointer;}
  </style>
  </head>

  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

    @include('layouts.nav')

    @include('layouts.errors')

    @if ($flash = session('message'))
    <div class="alert alert-success" role='alert'>
      <span class="closebtn">&times;</span>
      {{ $flash }}
    </div>
    @endif
    
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="/images/farmacia1.jpeg" alt="New York" width="1200" height="700">
          <div class="carousel-caption">
            <h3>New York</h3>
            <p>The atmosphere in New York is lorem ipsum.</p>
          </div>      
        </div>

        <div class="item">
          <img src="/images/farmacia2.jpg" alt="Chicago" width="1200" height="700">
          <div class="carousel-caption">
            <h3>Chicago</h3>
            <p>Thank you, Chicago - A night we won't forget.</p>
          </div>      
        </div>
      
        <div class="item">
          <img src="la.jpg" alt="Los Angeles" width="1200" height="700">
          <div class="carousel-caption">
            <h3>LA</h3>
            <p>Even though the traffic was a mess, we had the best time playing at Venice Beach!</p>
          </div>      
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div id="band" class="container text-center">
      <h3>LA FARMACIA</h3>
      <p><em>We love meds!</em></p>
      <p>We have created a fictional pharm website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <br>
      <h3>EL EQUIPO</h3>
      <div class="row">
        <div class="col-sm-4">
          <p class="text-center"><strong>Gonzalo</strong></p><br>
          <a href="#demo" data-toggle="collapse">
            <img src="" class="img-circle person" alt="Random Name" width="255" height="255">
          </a>
          <div id="demo" class="collapse">
            <p>Guitarist and Lead Vocalist</p>
            <p>Loves long walks on the beach</p>
            <p>Member since 1988</p>
          </div>
        </div>
        <div class="col-sm-4">
          <p class="text-center"><strong>Pedrito</strong></p><br>
          <a href="#demo2" data-toggle="collapse">
            <img src="" class="img-circle person" alt="Random Name" width="255" height="255">
          </a>
          <div id="demo2" class="collapse">
            <p>Drummer</p>
            <p>Loves drummin'</p>
            <p>Member since 1988</p>
          </div>
        </div>
        <div class="col-sm-4">
          <p class="text-center"><strong>Juanito</strong></p><br>
          <a href="#demo3" data-toggle="collapse">
            <img src="" class="img-circle person" alt="Random Name" width="255" height="255">
          </a>
          <div id="demo3" class="collapse">
            <p>Bass player</p>
            <p>Loves math</p>
            <p>Member since 2005</p>
          </div>
        </div>
      </div>
    </div>
    <div id="eventos" class="container text-center">
      <h3>ÚLTIMOS EVENTOS</h3>
      <div class="col-sm-12 col-md-12">
        @foreach($eventos as $evento)
          <div class="col-sm-4 col-md-4 text-center">
            <div class="thumbnail">
              <img src="/storage/{{ $evento->avatar_path }}" width="100%" height="100%" style="border-radius: 10px;">
              <div class="caption">
                <h2>{{ $evento->title }}</h2>
                <p><span class="glyphicon glyphicon-map-marker"></span> {{ $evento->pac_input }}</p>
                <p><span class="glyphicon glyphicon-time"></span> {{ $evento->fecha }}</p>
                <p><a href="/eventos/{{ $evento->id }}" class="btn btn-primary" role="button">Infórmate</a></p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <div id="posts" class="container text-center">
      <h3>ÚLTIMOS POSTS</h3>
      <div class="col-sm-12 col-md-12">
        @foreach($posts as $post)
          <div class="col-sm-4 col-md-4 text-center">
            <div class="thumbnail">
              <img src="/storage/{{ $post->avatar_path }}" width="100%" height="100%" style="border-radius: 10px;">
              <div class="caption">
                <h2>{{ $post->title }}</h2>
                <p><a href="/posts/{{ $post->id }}" class="btn btn-primary" role="button">Ver post</a></p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
        <!-- Container (Contact Section) -->
    <div id="contact" class="text-center">
      <h3 class="text-center">CONTACTO</h3>
          <p><span class="glyphicon glyphicon-map-marker"></span> Calle Luna, 46, 11500 Puerto de Santa María (El), Cádiz</p>
          <p><span class="glyphicon glyphicon-phone"></span> Phone: +34 956 85 24 25</p>
          <p><span class="glyphicon glyphicon-envelope"></span> Email: mail@mail.com</p>
          <p>Síguenos</p>
          <a class="social" href="https://facebook.com/">
          <i class="fa fa-facebook"></i></a>
          <a class="social" href="https://twitter.com/">
          <i class="fa fa-twitter"></i></a>
          <a class="social" href="https://twitter.com/">
          <i class="fa fa-instagram"></i></a>
    </div>
    <br>
    <div id="googleMap"></div>
    <script>
    function myMap() {
      var myCenter = new google.maps.LatLng(36.599573060344134,-6.227319538593292);
      var mapProp = {center:myCenter, zoom:17, scrollwheel:false, draggable:true, mapTypeId:google.maps.MapTypeId.ROADMAP};
      var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
      var marker = new google.maps.Marker({position:myCenter});
      marker.setMap(map);
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAgYAjnd52sU21ir5MX1hOutho4yqC9FI&callback=myMap"></script>

    @include('layouts.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
      var close = document.getElementsByClassName("closebtn");
      var i;

      for (i = 0; i < close.length; i++) {
          close[i].onclick = function(){
              var div = this.parentElement;
              div.style.opacity = "0";
              setTimeout(function(){ div.style.display = "none"; }, 600);
          }
      }
    </script>

  </body>
</html>