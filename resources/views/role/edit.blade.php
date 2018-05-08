@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/roles') }}">Roles</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
			<h5>Editar rol {{ $role->name }} </h5>
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif
				<form method="POST" action="{{ url('roles/edit/'.$role->id) }}">
					@csrf
					<div class="form-group row">
						<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
						<div class="col-md-6">
						<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $role->name }}" required autofocus>
							@if ($errors->has('name'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Nivel') }}</label>
						<div class="col-md-6">
							<select name="level" class="custom-select">
							@if ($role->level == 1)
								<option value="1">Alto</option>
								<option value="2">Medio</option>
							@elseif ($role->level == 2)
							<option value="2">Medio</option>
							@endif
							<option value="3">Bajo</option>
							</select>
						</div>
					</div>
				  <div class="form-group row mb-0">
						<div class="col-md-6 offset-md-4">
							<button type="submit" class="btn btn-primary">
								{{ __('Guardar') }}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
