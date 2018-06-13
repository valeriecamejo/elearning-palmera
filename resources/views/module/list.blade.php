@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active">Modulos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/modules/create') }}">Nuevo</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <h5 class="card-title">Listado</h5>
        <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Ruta</th>
            <th>Acciones</th>
          </tr>
          @foreach ($modules as $module)
          <tr>
            <td>{{ $module->id }}</td>
            <td>{{ $module->name }}</td>
            <td>{{ $module->path }}</td>
            <td>
              <a href="{{ url('/modules/show/'.$module->id) }}" title="Ver">
                <i class="fas fa-eye"></i>
              </a>
              <a href="{{ url('/modules/edit/'.$module->id) }}" title="Editar">
                <i class="fas fa-edit"></i>
              </a>
              <a href="{{ url('/modules/deactive_description/'.$module->id) }}">
              @if ($module->active == true)
                <i class="fas fa-minus-circle text-danger" title="Desactivar"></i>
              @else
                <i class="fas fa-play-circle text-success" title="Activar"></i>
              @endif
              </a>
            </td>
          </tr>
          @endforeach
        </table>
        {{ $modules->links() }}
      </div>
    </div>
  </div>
</div>
@endsection