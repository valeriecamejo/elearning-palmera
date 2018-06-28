@extends('layouts.app')

@section('content')
<div>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/states') }}">Estados/Provincias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active">Nuevo</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <h5 class="card-title">Crear un nuevo Estado/Provincia</h5>
          <form method="POST" action="{{ route('states/create') }}">
            @csrf
            <input id="country_id" type="hidden" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="country_id" value="{{ $country->id }}">
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Pais') }}</label>
              <div class="col-md-6">
                <input id="country_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="country_name" value="{{ $country->name }}" disabled>
              </div>
            </div>
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
</div>

{!! Html::script('/js/vueJs/state/create.js') !!}
@endsection
