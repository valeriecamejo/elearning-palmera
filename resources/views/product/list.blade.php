@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/products') }}">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active">Listado</a>
          </li>
          @if($permissions->permissions->crear == true)
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/products/create') }}">Nuevo</a>
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
            <th>Precio</th>
            <th>Valoración/Puntaje</th>
            <th>Activo</th>
            <th>Creado</th>
            <th>Opciones</th>
          </tr>
          @foreach ($products as $product)
          <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->valoration }}</td>
            <td>{{ $product->active ? 'SI' : 'NO' }}</td>
            <td>{{ $product->created_at }}</td>
            <td>
              @if($permissions->permissions->ver == true)
                <a class="" href="{{ url('/products/show/'.$product->id) }}" title="Ver">
                  <i class="fas fa-eye"></i>
                </a>
              @endif
              @if($permissions->permissions->editar == true)
                <a class="" href="{{ url('/products/edit/'. $product->id) }}" title="Editar">
                  <i class="fas fa-edit"></i>
                </a>
              @endif
                <a class="" href="{{ url('contents/'. $product->id) }}" title="Contenidos">
                  <i class="fas fa-file-alt"></i>
                </a>
              <a class="" href="{{ url('downloads/' . $product->id ) }}" title="Descargas">
                <i class="fas fa-download"></i>
              </a>
              @if($permissions->permissions->eliminar == true)
                <a class="" href="{{ url('/products/active_deactive/'.$product->id) }}" title="Activar / Desactivar">
                @if ($product->active == true)
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
        {{ $products->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
