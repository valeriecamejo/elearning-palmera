@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/brands') }}">Marcas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active">Nueva</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<h5 class="card-title">Crear una nueva marca</h5>
				<form method="POST" action="{{ route('brands/create') }}">
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
            <label for="navbar_color" class="col-md-4 col-form-label text-md-right">{{ __('Color de Menú') }}</label>
            <div class="col-md-2 col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="navbar_color" id="navbar_color" value="navbar-light bg-light" checked>
                <label class="form-check-label" for="navbar_color">
                  <span class="badge badge-light">navbar-light</span>
                </label>
              </div> 
              <div class="form-check">
                <input class="form-check-input" type="radio" name="navbar_color" id="navbar_color" value="navbar-dark bg-primary">
                <label class="form-check-label" for="navbar_color">
                  <span class="badge badge-primary">navbar-primary</span>
                </label>
              </div> 
              <div class="form-check">
                <input class="form-check-input" type="radio" name="navbar_color" id="navbar_color" value="navbar-dark bg-dark">
                <label class="form-check-label" for="navbar_color">
                  <span class="badge badge-dark">navbar-dark</span>
                </label>
              </div>  
            </div>
            <div class="col-md-4 col-sm-10">
              <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#">Menú</a>
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="#">Inicio</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
					<div class="form-group row">
						<label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>
						<div class="col-md-6">
							<input id="logo" type="text" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" name="logo" value="{{ old('logo') }}" autofocus>
							@if ($errors->has('logo'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('logo') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="header" class="col-md-4 col-form-label text-md-right">{{ __('Imagen Header') }}</label>
						<div class="col-md-6">
							<input id="header" type="text" class="form-control{{ $errors->has('header') ? ' is-invalid' : '' }}" name="header" value="{{ old('header') }}" autofocus>
							@if ($errors->has('header'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('header') }}</strong>
								</span>
							@endif
						</div>
					</div>
				  <div class="form-group row mb-0">
						<div class="col-md-6 offset-md-4">
							<button type="submit" class="btn btn-primary">
								{{ __('Register') }}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
