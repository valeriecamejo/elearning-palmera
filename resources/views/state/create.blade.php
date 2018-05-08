@extends('layouts.app')

@section('content')
<div id="state">
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
        <template v-if="data_ready == true">
        <template v-if="countries != ''">
          <div class="card-body">
          <h5 class="card-title">Crear un nuevo Estado/Provincia</h5>
            <form method="POST" action="{{ route('states/create') }}">
              @csrf
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Pais') }}</label>
                <div class="col-md-6">
                  <select v-model="country_id" name="country_id" class="form-control" required>
                    <option disabled value="">Seleccione</option>
                    <option v-for="country in countries" :value="country.id">
                        @{{ country.name }}
                    </option>
                  </select>
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
        </template>
        <template v-else>
            <div class="card-body">
              <div class="form-group row ">
                <div class="col-md-8 offset-md-2">
                  <div class="alert alert-info" role="alert">
                    No posee paises activos para crear un estado/provincia
                  </div>
                </div>
              </div>
            </div>
        </template>
        </template>
      </div>
    </div>
  </div>
</div>

{!! Html::script('/js/vueJs/state/create.js') !!}
@endsection
