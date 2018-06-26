@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active">Usuarios</a>
          </li>
          @if($permissions->permissions->crear == true)
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/users/create') }}">Nuevo</a>
            </li>
          @endif
        </ul>
      </div>
      <div class="card-body">
        <h5 class="card-title">Listado</h5>
        <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Activo</th>
            <th>Creado</th>
            <th>Opciones</th>
          </tr>
          @foreach ($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->dni }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->active ? 'SI' : 'NO' }}</td>
            <td>{{ $user->created_at }}</td>
            <td>
              @if($permissions->permissions->ver == true)
                <a class="" href="{{ url('/users/show/'.$user->id) }}" title="Ver">
                  <i class="fas fa-eye"></i>
                </a>
              @endif
              @if($permissions->permissions->editar == true)
                <a class="" href="{{ url('/users/edit/'.$user->id) }}" title="Editar">
                  <i class="fas fa-edit"></i>
                </a>
              @endif
              @if($permissions->permissions->eliminar == true)
                <a class="" href="{{ url('/users/active_deactive/'.$user->id) }}" title="Activar / Desactivar">
                @if ($user->active == true)
                  <i class="fas fa-minus-circle text-danger"></i>
                @else
                  <i class="fas fa-play-circle text-success"></i>
                @endif
                </a>
              @endif
            </td>
          </tr>
          @endforeach
        </table>
        {{ $users->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
