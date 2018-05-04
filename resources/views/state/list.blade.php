@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active">Estados/Provincias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/states/create') }}">Nuevo</a>
          </li>
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
          @foreach ($states as $state)
          <tr>
            <td>{{ $state->id }}</td>
            <td>{{ $state->name }}</td>
            <td>{{ $state->created_at }}</td>
            <td>
              <a href="{{ url('/states/show/'.$state->id) }}" title="Ver">
                <i class="fas fa-eye"></i>
              </a>
              <a href="{{ url('/states/edit/'.$state->id) }}" title="Editar">
                <i class="fas fa-edit"></i>
              </a>
              <a href="{{ url('/states/active_deactive/'.$state->id) }}" title="Activar/Desactivar">
              @if ($state->active == true)
                <i class="fas fa-minus-circle text-danger"></i>
              @else
                <i class="fas fa-play-circle text-success"></i>
              @endif
              </a>
            </td>
          </tr>
          @endforeach
        </table>
        {{ $states->links() }}
      </div>
    </div>
  </div>
</div>
@endsection