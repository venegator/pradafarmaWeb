@if (count($errors))
	<div class="alert alert-danger alert-dismissable">
		<span class="closebtn">&times;</span>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif