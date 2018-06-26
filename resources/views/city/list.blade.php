@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
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
        <h5 class="card-title">Listado</h5>
        <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Creado</th>
            <th>Acciones</th>
          </tr>
          @foreach ($cities as $city)
          <tr>
            <td>{{ $city->id }}</td>
            <td>{{ $city->name }}</td>
            <td>{{ $city->created_at }}</td>
            <td>
              @if($permissions->permissions->ver == true)
                <a href="{{ url('/cities/show/'.$city->id) }}" title="Ver">
                  <i class="fas fa-eye"></i>
                </a>
              @endif
              @if($permissions->permissions->editar == true)
                <a href="{{ url('/cities/edit/'.$city->id) }}" title="Editar">
                  <i class="fas fa-edit"></i>
                </a>
              @endif
              @if($permissions->permissions->eliminar == true)
                <a class="" href="{{ url('/cities/active_deactive/'.$city->id) }}">
                @if ($city->active == true)
                  <i class="fas fa-minus-circle text-danger" title="Desactivar"></i>
                @else
                  <i class="fas fa-play-circle text-success" title="Activar"></i>
                @endif
                </a>
              @endif
            </td>
          </tr>
          @endforeach
        </table>
        {{ $cities->links() }}
      </div>
    </div>
  </div>
</div>
@endsection