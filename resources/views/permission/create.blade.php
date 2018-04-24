@extends('layouts.app')

@section('content')
<div id="role">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Crear permisos para {{ $role_name }}</h5>
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif
          <form method="POST" action="{{ route('roles/create') }}">
            @csrf
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Módulos') }}</label>
              <div class="col-md-6">
                <!-- <select class="custom-select" required>
                  <option selected>Seleccionar</option>
                    <option>
                    </option>
                </select> -->
                <select v-model="selected">
                  <option v-for="option in options" v-bind:value="option.value">
                    @{{ option.text }}
                  </option>
                </select>
                <span>Selected: @{{ selected }}</span>
              </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Permisos') }}</label>
                <div class="col-md-6">
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="show" id="ver" value="ver" checked> Ver
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="create" id="crear" value="crear"> Crear
                    </label>
                  </div>
                  <div class="form-check form-check-inline disabled">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="edit" id="editar" value="editar"> Editar
                    </label>
                  </div>
                  <div class="form-check form-check-inline disabled">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="delete" id="eliminar" value="eliminar"> Eliminar
                    </label>
                  </div>
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

<!-- <script src="/js/vueJs/role/permission.js"></script> -->
{!! Html::script('/js/vueJs/role/permission.js') !!}
<script> role.permission( {{ $role_id }} )</script>
@endsection