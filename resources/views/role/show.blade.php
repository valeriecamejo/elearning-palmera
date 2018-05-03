@extends('layouts.app')

@section('content')
<div id="role">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
      <template v-if="show_modules_deactive !== ''">
        <div class="alert alert-secondary" role="alert">
            <h4>Permisos de {{ $role->name }}</h4>
        </div>
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif
            @csrf
              <div class="form-group row" v-for="deactive_module in deactive_modules">
                <label for="email" class="col-md-4 col-form-label text-md-right">@{{ deactive_module.name }}:</label>
                <div class="col-md-1">
                </div>
                    <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" id="show" value="ver" v-model="deactive_module.permissions.ver" disabled> Ver
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" id="john" value="crear" v-model="deactive_module.permissions.crear" disabled> Crear
                      </label>
                    </div>
                    <div class="form-check form-check-inline disabled">
                      <label class="form-check-label">
                        <input type="checkbox" id="mike" value="editar" v-model="deactive_module.permissions.editar" disabled> Editar
                      </label>
                    </div>
                    <div class="form-check form-check-inline disabled">
                      <label class="form-check-label">
                        <input type="checkbox" id="mike" value="eliminar" v-model="deactive_module.permissions.eliminar" disabled> Eliminar
                      </label>
                    </div>
              </div>
          </div>
          <template v-if="deactive_modules == 0">
            <div class="card-body">
              <div class="form-group row ">
                <div class="col-md-8 offset-md-2">
                  <div class="alert alert-info" role="alert">
                    El rol <strong>{{ $role->name }}</strong> no posee permisos asignados a ningun modulo
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
<script> Role.showRole( {{ $role_id }} )</script>
@endsection