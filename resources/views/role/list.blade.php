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
            <li class="nav-item">
              <a class="nav-link" href="{{ url('roles/create') }}">Nuevo</a>
            </li>
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
              <td>{{ $role->name }}</td>
              <td>
                <a href="{{ url('roles/permission/'.$role->id) }}"><i class="fas fa-plus-circle"></i></a>
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