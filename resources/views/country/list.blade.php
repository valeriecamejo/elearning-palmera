@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active">Paises</a>
          </li>
          @if($permissions->permissions->crear == true)
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/countries/create') }}">Nuevo</a>
            </li>
          @endif
        </ul>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <div class="col-md-6">
            <h5 class="card-title">Listado</h5>
          </div>
        </div>
        <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Nickname</th>
            <th>Acciones</th>
          </tr>
          @foreach ($countries as $country)
          <tr>
            <td>{{ $country->id }}</td>
            <td>{{ $country->name }}</td>
            <td>{{ $country->nickname }}</td>
            <td>
              @if($permissions->permissions->ver == true)
                <a href="{{ url('/countries/show/'.$country->id) }}" title="Ver">
                  <i class="fas fa-eye"></i>
                </a>
              @endif
              @if($permissions->permissions->editar == true)
                <a href="{{ url('/countries/edit/'.$country->id) }}" title="Editar">
                  <i class="fas fa-edit"></i>
                </a>
              @endif
              @if($permissions->permissions->eliminar == true)
                <a class="" href="{{ url('/countries/active_deactive/'.$country->id) }}">
                @if ($country->active == true)
                  <i class="fas fa-minus-circle text-danger" title="Desactivar"></i>
                @else
                  <i class="fas fa-play-circle text-success" title="Activar"></i>
                @endif
                </a>
              @endif
              @if($permissions->permissions->crear == true)
                <a href="{{ url('/states/create/'.$country->id) }}" title="Crear Estado">
                  <i class="fas fa-plus-circle"></i>
                </a>
              @endif
            </td>
          </tr>
          @endforeach
        </table>
        {{ $countries->links() }}
      </div>
    </div>
  </div>
</div>
@endsection