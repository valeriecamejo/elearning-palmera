@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/stores') }}">Tiendas</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
      <h5>{{ $store->name }}</h5>
					@csrf
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $store->name }}</p>
            </div>
          </div>
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $store->description }}</p>
            </div>
          </div>
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Direccion:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $store->address }}</p>
            </div>
          </div>
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Pais:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $country->name }}</p>
            </div>
          </div>
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Estado:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $state->name }}</p>
            </div>
          </div>
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Habilitado:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $store->active ? 'SI' : 'NO' }}</p>
            </div>
          </div>
          @if($store->active == false)
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Deshabilitado por:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $user->name . ' ' . $user->last_name }}</p>
            </div>
          </div>
          <div class="form-group row">
              <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Motivo de Desactivacion:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $store->deactive_description }}</p>
            </div>
          </div>
          @endif
			</div>
		</div>
	</div>
</div>
@endsection
