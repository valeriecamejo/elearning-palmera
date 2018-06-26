@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active">Tiendas</a>
          </li>
          @if($permissions->permissions->crear == true)
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/stores/create') }}">Nueva</a>
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
            <th>Descripcion</th>
            <th>Acciones</th>
          </tr>
          @foreach ($stores as $store)
          <tr>
            <td>{{ $store->id }}</td>
            <td>{{ $store->name }}</td>
            <td>{{ $store->description }}</td>
            <td>
              @if($permissions->permissions->ver == true)
                <a href="{{ url('/stores/show/'.$store->id) }}" title="Ver">
                  <i class="fas fa-eye"></i>
                </a>
              @endif
              @if($permissions->permissions->editar == true)
                <a href="{{ url('/stores/edit/'.$store->id) }}" title="Editar">
                  <i class="fas fa-edit"></i>
                </a>
              @endif
              @if($permissions->permissions->eliminar == true)
                <a href="{{ url('/stores/deactive_description/'.$store->id) }}">
                @if ($store->active == true)
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
        {{ $stores->links() }}
      </div>
    </div>
  </div>
</div>
@endsection