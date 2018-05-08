@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/countries') }}">Paises</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
      <h5>{{ $country->name }}</h5>
					@csrf
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $country->name }}</p>
            </div>
          </div>
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Nickname:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $country->nickname }}</p>
            </div>
          </div>
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Creado:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $country->created_at }}</p>
            </div>
          </div>
			</div>
		</div>
	</div>
</div>
@endsection
