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
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/users/create') }}">Nuevo</a>
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
            <th>ID</th>
            <th>Email</th>
            <th>Nombre</th>
            <th>Creado</th>
          </tr>
          @foreach ($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->created_at }}</td>
          </tr>
          @endforeach
        </table>
        {{ $users->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
