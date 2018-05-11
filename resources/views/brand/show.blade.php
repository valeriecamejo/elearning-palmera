@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
        {{ $brand->name }}
			</div>
			<div class="card-body">
					<div class="form-group row">
						<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
            <p class="col-form-label">{{ $brand->name }}</p>						
					</div>
          <div class="form-group row">
            <label for="navbar_color" class="col-md-4 col-form-label text-md-right">{{ __('Color de Menú') }}</label>
            <div class="col-md-6">
              <nav class="navbar {{ $brand->navbar_color }}">
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
            <p class="col-form-label">{{ $brand->logo }}</p>						
					</div>
					<div class="form-group row">
						<label for="header" class="col-md-4 col-form-label text-md-right">{{ __('Imagen Header') }}</label>
            <p class="col-form-label">{{ $brand->header }}</p>						
					</div>				  
			</div>
		</div>
	</div>
</div>
@endsection
