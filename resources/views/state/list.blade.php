@extends('layouts.app')

@section('content')
<div id="filter" class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active">Estados/Provincias</a>
          </li>
          @if($permissions->permissions->crear == true)
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/states/create') }}">Nuevo</a>
          </li>
          @endif
        </ul>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <div class="col-md-6">
            <h5 class="card-title">Listado</h5>
          </div>
          <div class="col-md-4 offset-md-2">
            <select v-model="country_id" @change="filterCountry(country.id)" class="form-control" required>
              <option desabled value=''>Países</option>
              <option v-for="country in countries" :value="country.id"  >
                @{{ country.name }}
              </option>
            </select>
          </div>
        </div>
        <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>País</th>
            <th>Acciones</th>
          </tr>
          <tr v-for="state in states">
            <td>@{{ state.id }}</td>
            <td>@{{ state.name }}</td>
            <td v-for="country in countries" v-if="country.id==state.country_id">@{{ country.name }}</td>
            <td>
              <a v-if="state_permissions.ver==true" :href="'/states/show/' + state.id" title="Ver">
                <i class="fas fa-eye"></i>
              </a>
              <a v-if="state_permissions.editar==true" :href="'/states/edit/' + state.id" title="Editar">
                <i class="fas fa-edit"></i>
              </a>
              <a v-if="state_permissions.eliminar==true" :href="'/states/active_deactive/' + state.id">
                <i v-if="state.active==true" class="fas fa-minus-circle text-danger" title="Desactivar"></i>
                <i v-else class="fas fa-play-circle text-success" title="Activar"></i>
              </a>
              <a v-if="state_permissions.crear==true" :href="'/cities/create/' + state.id" title="Crear Ciudad">
                <i class="fas fa-plus-circle"></i>
              </a>
            </td>
          </tr>
        </table>
        {{ $states->links() }}
      </div>
    </div>
  </div>
</div>
{!! Html::script('/js/vueJs/state/filter.js') !!}
@endsection