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
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/countries/create') }}">Nuevo</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <h5 class="card-title">Listado</h5>
        <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Nickname</th>
            <th>Creado</th>
            <th>Acciones</th>
          </tr>
          @foreach ($countries as $country)
          <tr>
            <td>{{ $country->id }}</td>
            <td>{{ $country->name }}</td>
            <td>{{ $country->nickname }}</td>
            <td>{{ $country->created_at }}</td>
            <td>
              <a href="{{ url('/countries/edit/'.$country->id) }}" title="Editar País">
                <i class="fas fa-edit"></i>
              </a>
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