@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/downloads') }}">Descargables</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
      <h5>{{ $download->name }}</h5>
					@csrf
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $download->name }}</p>
            </div>
          </div>
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $download->description }}</p>
            </div>
          </div>
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Archivo:') }}</label>
            <div class="col-md-6">
              <a href="{{ asset('storage/' . Auth::user()->brand_id . '/' . $download->file) }}"  target="_blank"> {{ $download->file }}
              </a>
            </div>
          </div>
          <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Creado:') }}</label>
            <div class="col-md-6">
              <p class="col-form-label">{{ $download->created_at }}</p>
            </div>
          </div>
			</div>
		</div>
	</div>
</div>
@endsection
