@extends('layouts.app')

@section('content')
<div id="filter" class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active">Ciudades</a>
          </li>
          @if($permissions->permissions->crear == true)
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/cities/create') }}">Nuevo</a>
            </li>
          @endif
        </ul>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <div class="col-md-4">
            <h5 class="card-title">Listado</h5>
          </div>
          <div class="col-md-4">
            <select v-model="country_id" @change="filterCountry(country.id)" class="form-control" required>
              <option desabled value=''>Países</option>
              <option v-for="country in countries" :value="country.id">
                @{{ country.name }}
              </option>
            </select>
          </div>
          <div class="col-md-4">
            <select v-model="state_id" @change="filterState(state.id)" class="form-control" required>
              <option desabled value=''>Estados/Provincias</option>
              <option v-for="state in states" :value="state.id"  >
                @{{ state.name }}
              </option>
            </select>
          </div>
        </div>
        <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
          <tr v-for="city in cities">
            <td>@{{ city.id }}</td>
            <td>@{{ city.name }}</td>
            <td v-for="state in states" v-if="city.state_id==state.id">@{{ state.name }}</td>
            <td>
              <a v-if="city_permissions.ver==true" :href="'/cities/show/' + city.id" title="Ver">
                <i class="fas fa-eye"></i>
              </a>
              <a v-if="city_permissions.editar==true" :href="'/cities/edit/' + city.id" title="Editar">
                <i class="fas fa-edit"></i>
              </a>
              <a v-if="city_permissions.eliminar==true" :href="'/cities/active_deactive/' + city.id">
                <i v-if="city.active==true" class="fas fa-minus-circle text-danger" title="Desactivar"></i>
                <i v-else class="fas fa-play-circle text-success" title="Activar"></i>
              </a>
            </td>
          </tr>
        </table>
        {{ $cities->links() }}
      </div>
    </div>
  </div>
</div>
{!! Html::script('/js/vueJs/city/filter.js') !!}
@endsection