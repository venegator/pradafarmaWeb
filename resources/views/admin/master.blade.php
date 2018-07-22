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
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
      .level { display: flex; align-items: center; }
      .flex { flex: 1; }
      .mr-1 { margin-right: 1em; }
      [v-cloak] { display: none; }
      .alert {
        position: fixed;
        right: 25px;
        bottom: 25px;
        z-index: 1;
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

      .sidenav {
          font-family: Montserrat, sans-serif;
          letter-spacing: 4px;
          height: 100%;
          width: 250px;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #111;
          overflow-x: hidden;
      }

      .nav-pills>li>a{
        text-decoration: none;
        font-size: 20px;
        color: #d5d5d5;
      }
      .nav-pills>li>a:hover{
        color: white;
        background-color: #111;
      }

      .sidenav a {
          text-decoration: none;
          font-size: 20px;
          color: #d5d5d5;
          display: block;
      }

      @media screen and (max-height: 450px) {
          .sidenav {padding-top: 15px;}
          .sidenav a {font-size: 18px;}
      }    
      .table td.text {
          max-width: 177px;
      }
      .table td.text span {
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
          display: inline-block;
          max-width: 100%;
      }

      #map {
        width: 100%;
        height: 400px;
      }
      .controls {
        background-color: #fff;
        border-radius: 2px;
        border: 1px solid transparent;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        box-sizing: border-box;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        height: 29px;
        margin-left: 17px;
        margin-top: 10px;
        outline: none;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      .controls:focus {
        border-color: #4d90fe;
      }
      .title {
        font-weight: bold;
      }
      #infowindow-content {
        display: none;
      }
      #map #infowindow-content {
        display: inline;
      }
  </style>
  </head>

  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    @include('admin.sidenav')
    <div id="app" style="margin-left: 250px;">
        @include('layouts.errors')
        @if ($flash = session('message'))
          <div class="alert alert-success" role='alert'>
            <span class="closebtn">&times;</span>
              {{ $flash }}
          </div>
        @endif

        {{-- <flash message="{{ session('flash') }}"></flash> --}}

        @yield('content')
    </div>
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
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
  </body>
</html>