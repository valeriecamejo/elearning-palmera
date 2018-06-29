@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active">Marcas</a>
          </li>
          @if($permissions->permissions->crear == true)
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/brands/create') }}">Nueva</a>
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
            <th>Color de Menú</th>
            <th>Activo</th>
            <th>Opciones</th>
          </tr>
          @foreach ($brands as $brand)
          <tr>
            <td>{{ $brand->id }}</td>
            <td>{{ $brand->name }}</td>
            <td>{{ $brand->navbar_color }}</td>
            <td>{{ $brand->active ? 'SI' : 'NO' }}</td>
            <td>
              @if($permissions->permissions->ver == true)
                <a class="" href="{{ url('/brands/show/'.$brand->id) }}" title="Ver">
                  <i class="fas fa-eye"></i>
                </a>
              @endif
              @if($permissions->permissions->editar == true)
                <a class="" href="{{ url('/brands/edit/'.$brand->id) }}" title="Editar">
                  <i class="fas fa-edit"></i>
                </a>
              @endif
              @if($permissions->permissions->eliminar == true)
                <a class="" href="{{ url('/brands/active_deactive/'.$brand->id) }}" title="Activar / Desactivar">
                @if ($brand->active == true)
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
        {{ $brands->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
