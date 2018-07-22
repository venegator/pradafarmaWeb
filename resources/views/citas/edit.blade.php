@extends('forum.master')

@section('content')
<div class="container">
	<div class="page-header">
		<h1>Editar cita</h1>
	</div>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 blog-main">
			<div class="panel panel-default">
				<div class="panel-heading">
					Cita
				</div>
				<div class="panel-body">
					<form method="POST" action="/citas/{{ $cita->id }}/update">
						{{ csrf_field() }}
						{{ method_field('PATCH') }}

						<div class="form-group">
							  <label for="servicio">Servicio :</label>
							  <select class="form-control" id="servicio" name="servicio" required>
							  		<option value="">Selecciona uno...</option>
							    	<option value="Nutricionista">Nutricionista</option>
									<option value="Análisis de piel rápido">Análisis de piel rápido</option>
									<option value="Análisis de piel con informe">Análisis de piel con informe</option>
									<option value="Análisis capilar">Análisis capilar</option>
									<option value="Identificación pedicular">Identificación pedicular</option>
									<option value="Análisis celulitis">Análisis celulitis</option>
									<option value="Tratamiento en cabina">Tratamiento en cabina</option>
									<option value="Grupo sanguíneo">Grupo sanguíneo</option>
									<option value="Perfil hipídico">Perfil hipídico</option>
							  </select>
							</div>

							<div class="form-group">
							    <label for="name">Nombre</label>
							    <input type="text" class="form-control" id="name" name="name" value="{{ $cita->name }}" required>
							</div>
							<div class="form-group">
							    <label for="apellidos">Apellidos</label>
								<input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $cita->apellidos }}" required>
							</div>
							<div class="form-group">
							    <label for="apellidos">Email:</label>
								<input type="text" class="form-control" id="email" name="email" value="{{ $cita->email }}" required>
							</div>
							<div class="form-group">
								<label for="fecha">Fecha:</label>
							    <div class='input-group'>
				                    <input type='datetime-local' class="form-control" name="fecha"/>
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
							</div>
							<div class="form-group">
							    <label for="observaciones">Observaciones :</label>
								<textarea name="observaciones" id="observaciones" rows="7" style="width: 100%">{{ $cita->observaciones }}</textarea>
							</div>
							<div class="form-group">
							  	<button type="submit" class="btn btn-primary">Guardar cambios</button>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection