@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/roles/list') }}">Roles</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active">Nuevo</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<h5 class="card-title">Crear un nuevo rol</h5>
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif
				<form method="POST" action="{{ route('roles/create') }}">
					@csrf
					<div class="form-group row">
						<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
						<div class="col-md-6">
							<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
							@if ($errors->has('name'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Permisos') }}</label>
						<div class="col-md-6">
              <select name="modulo" class="custom-select">
                <option selected>Seleccionar</option>
                <option value="usuarios">Usuarios</option>
              </select>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="show" id="inlineCheckbox1" value="ver" checked> Ver
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="create" id="inlineCheckbox2" value="crear"> Crear
                </label>
              </div>
              <div class="form-check form-check-inline disabled">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="edit" id="inlineCheckbox3" value="editar" > Editar
                </label>
              </div>
              <div class="form-check form-check-inline disabled">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="delete" id="inlineCheckbox3" value="eliminar" > Eliminar
                </label>
              </div>
						</div>
					</div>
				  <div class="form-group row mb-0">
						<div class="col-md-6 offset-md-4">
							<button type="submit" class="btn btn-primary">
								{{ __('Crear') }}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
