@extends('layouts.app')

@section('content')
<div id="role">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/roles/list') }}">Roles</a>
            </li>
          </ul>
        </div>
      <template v-if="show_modules !== ''">
        <div v-if="showModal == true" class="alert alert-secondary" role="alert">
          Permiso agregado exitosamente
        </div>
        <div class="card-body">
        <template v-if="show_modules == true">
          <h5 class="card-title">Crear permisos para {{ $role_name }}</h5>
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif
            @csrf
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Módulos') }}</label>
                <div class="col-md-6">
                  <select v-model="module_permissions.module_id" class="custom-select" required>
                  <option disabled value="">Seleccione</option>
                    <option v-for="active_module in active_modules" v-bind:value="active_module.id">
                      @{{ active_module.name }}
                    </option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Permisos') }}</label>
                  <div class="col-md-8">
                    <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" id="show" value="ver" v-model="module_permissions.permissions.ver"> Ver
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" id="john" value="crear" v-model="module_permissions.permissions.crear"> Crear
                      </label>
                    </div>
                    <div class="form-check form-check-inline disabled">
                      <label class="form-check-label">
                        <input type="checkbox" id="mike" value="editar" v-model="module_permissions.permissions.editar"> Editar
                      </label>
                    </div>
                    <div class="form-check form-check-inline disabled">
                      <label class="form-check-label">
                        <input type="checkbox" id="mike" value="eliminar" v-model="module_permissions.permissions.eliminar"> Eliminar
                      </label>
                    </div>
                  </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button v-if="((module_permissions.permissions.ver) || (module_permissions.permissions.crear) || (module_permissions.permissions.editar) || (module_permissions.permissions.eliminar))
                                " type="submit" @click="addPermission({{ $role_id }})" class="btn btn-primary">
                    {{ __('Crear') }}
                  </button>
                </div>
              </div>
        </template>
            </div>
        <template v-if="show_modules == false">
            <div class="card-body">
              <div class="form-group row ">
                <div class="col-md-8 offset-md-2">
                  <div class="alert alert-info" role="alert">
                    Ha asignado permisos a todos los modulos
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

{!! Html::script('/js/vueJs/role/permission.js') !!}
<script> Role.permission( {{ $role_id }} )</script>
@endsection