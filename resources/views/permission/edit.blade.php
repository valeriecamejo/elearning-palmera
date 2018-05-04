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
      <template v-if="show_modules_deactive !== ''">
        <div v-if="showModal == true" class="alert alert-secondary" role="alert">
            Permisos editados exitosamente
        </div>
        <div class="card-body">
        <template v-if="show_modules_deactive == true">
          <h5 class="card-title">Editar permisos para {{ $role_name }}</h5>
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif
            @csrf
              <div class="form-group row" v-for="deactive_module in deactive_modules">
                <label for="email" class="col-md-4 col-form-label text-md-right">@{{ deactive_module.name }}:</label>
                <div class="col-md-1">
                <input type="hidden"v-model="module_permissions.module_id">
                </div>
                    <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" id="show" value="ver" v-model="deactive_module.permissions.ver"> Ver
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" id="john" value="crear" v-model="deactive_module.permissions.crear"> Crear
                      </label>
                    </div>
                    <div class="form-check form-check-inline disabled">
                      <label class="form-check-label">
                        <input type="checkbox" id="mike" value="editar" v-model="deactive_module.permissions.editar"> Editar
                      </label>
                    </div>
                    <div class="form-check form-check-inline disabled">
                      <label class="form-check-label">
                        <input type="checkbox" id="mike" value="eliminar" v-model="deactive_module.permissions.eliminar"> Eliminar
                      </label>
                    </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" @click="editPermission({{ $role_id }})" class="btn btn-primary">
                    {{ __('Guardar') }}
                  </button>
                </div>
              </div>
            </template>
            </div>
            <template v-if="show_modules_deactive == false">
            <div class="card-body">
              <div class="form-group row ">
                <div class="col-md-8 offset-md-2">
                  <div class="alert alert-info" role="alert">
                    No existen permisos asignados a ningun modulo
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