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

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/0.11.1/trix.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
      html {
        position: relative;
        min-height: 100%;
      }
      body {
        /* Margin bottom by footer height */
        margin-bottom: 100px;
      }
      .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        /* Set the fixed height of the footer here */
        height: 100px;
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

      .onl_btn-facebook {background: #3b5998;border-color:#172d5e}
      .onl_btn-twitter {background: #00aced;border-color:#043d52}
      .onl_btn-google-plus {background: #c32f10;border-color:#6b1301}
    </style>
  </head>

  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    <div id="app">

      @include('layouts.nav')

      @include('layouts.errors')

      <br><br><br>

      @if ($flash = session('message'))
      <div class="alert alert-success" role='alert'>
        <span class="closebtn">&times;</span>
          {{ $flash }}
      </div>
      @endif

      <div class="container">
          @yield('content')
      </div>

      @include('layouts.footer')

    </div>

    <!-- Scripts -->
    <script id="dsq-count-scr" src="//pradafarma.disqus.com/count.js" async></script>
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
