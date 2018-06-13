@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/modules') }}">Modulos</a>
            </li>
          </ul>
        </div>
          <div class="card-body">
          <h5 class="card-title">Editar Tienda {{ $module->name }}</h5>
            <form method="POST" action="{{ url('/modules/edit/'.$module->id) }}">
              @csrf
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $module->name }}" required autofocus>
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
                <input id="path" type="text" class="form-control{{ $errors->has('path') ? ' is-invalid' : '' }}" name="path" value="{{ $module->path }}" required autofocus>
                @if ($errors->has('path'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('path') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
                <div class="col-md-6">
                  <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" rows="3" value="{{ $module->description }}"
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
                <select id="is_config" class="form-control{{ $errors->has('is_config') ? ' is-invalid' : '' }}" name="is_config" value="{{ $module->is_config }}" autofocus required>
                    <option value="0" @if ($module->is_config == 0)
                    selected
                  @endif > No </option>
                    <option value="1" @if ($module->is_config == 1)
                    selected
                  @endif > Si </option>
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
                    {{ __('Guardar') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
@endsection
