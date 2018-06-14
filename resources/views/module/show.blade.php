@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/modules') }}">Modules</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
      <h5>{{ $module->name }}</h5>
					@csrf
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $module->name }}</p>
            </div>
          </div>
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Ruta:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $module->path }}</p>
            </div>
          </div>
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $module->description }}</p>
            </div>
          </div>
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Pertenece a Configuracion:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $module->is_config ? 'SI' : 'NO' }}</p>
            </div>
          </div>
          @if($module->active == false)
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Deshabilitado por:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $user->name . ' ' . $user->last_name }}</p>
            </div>
          </div>
          <div class="form-group row">
              <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Motivo de Desactivacion:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $module->deactive_description }}</p>
            </div>
          </div>
          @endif
			</div>
		</div>
	</div>
</div>
@endsection
