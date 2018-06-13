@extends('layouts.app')

@section('content')
<div id="city">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/modules') }}">Modulos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active">Nuevo</a>
            </li>
          </ul>
        </div>
        <template v-if="data_ready == true">
        <template v-if="countries != ''">
          <div class="card-body">
          <h5 class="card-title">Crear un Modulo</h5>
            <form method="POST" action="{{ url('modules/create') }}">
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
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ruta') }}</label>
                <div class="col-md-6">
                <input id="path" type="text" class="form-control{{ $errors->has('path') ? ' is-invalid' : '' }}" name="path" value="{{ old('path') }}" required autofocus>
                @if ($errors->has('path'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('path') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
                <div class="col-md-6">
							<textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" rows="3" 
								name="description" autofocus></textarea>
                @if ($errors->has('description'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('description') }}</strong>
								</span>
							  @endif
						  </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('¿Pertenece a Configuracion?') }}</label>
                <div class="col-md-6">
                  <select id="is_config" class="form-control{{ $errors->has('is_config') ? ' is-invalid' : '' }}" name="is_config" autofocus required>
                    <option value="0"> No </option>
                    <option value="1"> Si </option>
                  </select>
                  @if ($errors->has('is_config'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('is_config') }}</strong>
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
{!! Html::script('/js/vueJs/city/create.js') !!}
@endsection
