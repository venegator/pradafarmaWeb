<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Pradafarma</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
	    <ul class="nav navbar-nav">
	      <li><a href="/home">INICIO</a></li>
	      <li><a href="/posts">BLOG</a></li>
	      <li><a href="/forum">FORO</a></li>
	      <li class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#">CITAS
	        <span class="caret"></span></a>
	        <ul class="dropdown-menu">
	        	@if(auth()->check() && auth()->user()->isAdmin())
	        	<li><a href="/citas">Ver citas</a></li>
	        	<hr>
	        	@endif
	          <li><a href="/nutri">Nutricionista</a></li>
	          <li><a href="/pielR">Análisis de piel rápido</a></li>
	          <li><a href="/piel">Análisis de piel con informe</a></li>
	          <li><a href="/capilar">Análisis capilar</a></li>
	          <li><a href="/pedi">Identificación pedicular</a></li>
	          <li><a href="/celu">Análisis celulitis</a></li>
	          <li><a href="/cabina">Tratamiento en cabina</a></li>
	          <li><a href="/sangui">Grupo sanguíneo</a></li>
	          <li><a href="/hipi">Perfil hipídico</a></li>
	        </ul>
	      </li>
	      <li><a href="/eventos">EVENTOS</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <!-- Authentication Links -->
		    @guest
		    	<li><a href="{{ route('login') }}">Login <span class="glyphicon glyphicon-user"></span></a></li>
		        <li><a href="{{ route('register') }}">Registrarse <span class="glyphicon glyphicon-log-in"></span></a></li>
		        {{-- <li><a href="#" data-toggle="modal" data-target="#loginModal">Login <span class="glyphicon glyphicon-user"></span></a></li>
		        		        		        		        		        <li><a href="#" data-toggle="modal" data-target="#registerModal">Registrarse <span class="glyphicon glyphicon-log-in"></span></a></li> --}}
		    @else

		    	<li class="dropdown">
			        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			            <i class="fa fa-bell"></i>
			            <span class="badge badge-light">{{ auth()->user()->unreadNotifications->count() }}</span>
			        </a>

			        <ul class="dropdown-menu">
			        	@if(auth()->user()->unreadNotifications->count() != 0)
			        		<li><a href="/profiles/{{ auth()->user()->name }}/notifications" class="text-center">Marcar como leídas</a></li>
			        	@endif
			            @foreach(auth()->user()->unreadNotifications as $notification)
			            	<li><a href="{{ $notification->data['link'] }}">{{$notification->data['message']}}</a></li>
			            @endforeach
			        </ul>
			    </li>

		        <li class="dropdown">
		            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		                {{ Auth::user()->name }} <span class="caret"></span>
		            </a>

		            <ul class="dropdown-menu">
		            	@if(auth()->user()->isAdmin())
		            	<li><a href="/admin">Panel de Administración</a></li>
		            	@endif
		            	<li><a href="{{ route('profile', Auth::user()->name) }}">Mi perfil</a></li>
		                <li><a href="{{ route('logout') }}">Logout</a></li>
		            </ul>
		        </li>
		    @endguest
		</ul>
	</div>
  </div>
</nav>

{{--<div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="text-center">Iniciar sesión</h2>
        </div>
        <div class="modal-body">
          	<form method="POST" action="/login">

				{{ csrf_field() }}

				<div class="form-group">
					<label for="email">Email Address:</label>
					<input type="email" class="form-control" id="email" name="email">
				</div>

				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" class="form-control" id="password" name="password">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-info btn-block">Sign in</button>
				</div>

			</form>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="registerModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="text-center">Regístrate</h2>
        </div>
        <div class="modal-body">
          	<form method="POST" action="/register">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" class="form-control" id="name" name="name" required>
				</div>

				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email" name="email" required>
				</div>

				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" class="form-control" id="password" name="password" required>
				</div>

				<div class="form-group">
					<label for="passwsord_confirmation">Password Confirmation:</label>
					<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-info btn-block">Register</button>
				</div>

			</form>
        </div>
      </div>
    </div>
</div>--}}