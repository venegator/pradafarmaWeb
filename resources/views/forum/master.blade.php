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
    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Styles -->

    @yield('head')

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

      /**
       * Profile image component
       */
      .profile-header-container{
          margin: 0 auto;
          text-align: center;
      }

      .profile-header-img {
          padding: 0px;
      }

      .profile-header-img > img.img-circle {
          width: 200px;
          height: 200px;
          border: 3px solid #619ea7;
      }

      .profile-header {
          margin-top: 43px;
      }

      /**
       * Ranking component
       */
      .rank-label-container {
          margin-top: -19px;
          /* z-index: 1000; */
          text-align: center;
      }

      .label.label-default.rank-label {
          background-color: rgba(97, 158, 167, 1);
          padding: 5px 10px 5px 10px;
          border-radius: 27px;
      }
    </style>
  </head>

  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    <div id="app">
        @include('layouts.nav')

        @include('layouts.errors')

        @if ($flash = session('message'))
          <div class="alert alert-success" role='alert'>
            <span class="closebtn">&times;</span>
              {{ $flash }}
          </div>
        @endif

        @if ($flash = session('error'))
          <div class="alert alert-danger" role='alert'>
            <span class="closebtn">&times;</span>
              {{ $flash }}
          </div>
        @endif

        {{-- <flash message="{{ session('flash') }}"></flash> --}}
        
        <div class="container">
          @yield('content')
        </div>

        @include('layouts.footer')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
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
