@extends('layouts.app')

@section('content')
<link href="{{ asset('/js/components/role/permission.js') }}">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active">Roles</a>
            </li>
            @if($permissions->permissions->crear == true)
              <li class="nav-item">
                <a class="nav-link" href="{{ url('roles/create') }}">Nuevo</a>
              </li>
            @endif
          </ul>
        </div>
        <div class="card-body">
          <h5 class="card-title">Listado</h5>
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif
          <table class="table table-striped">
            <tr>
              <th>Nombre</th>
              <th>Permisos</th>
            </tr>
            @foreach ($roles as $role)
            <tr>
              <td>
                @if($permissions->permissions->editar == true)
                  <a href="{{ url('/roles/edit/'.$role->id) }}" title="Editar Role">
                    <i class="fas fa-edit"></i>
                  </a>
                @endif
              {{ $role->name }}</td>
              <td>
                @if($permissions->permissions->ver == true)
                  <a class="" href="{{ url('/roles/show/'.$role->id) }}" title="Ver">
                    <i class="fas fa-eye"></i>
                  </a>
                @endif
                @if($permissions->permissions->editar == true)
                  <a href="{{ url('/roles/permission/'.$role->id) }}"  title="Agregar">
                    <i class="fas fa-plus-circle"></i>
                  </a>
                  <a href="{{ url('/roles/permission/show/'.$role->id) }}" title="Editar Permisos">
                    <i class="fas fa-clipboard-check"></i>
                  </a>
                @endif
              </td>
            </tr>
            @endforeach
          </table>
          {{ $roles->links() }}
        </div>
      </div>
    </div>
  </div>

@endsection