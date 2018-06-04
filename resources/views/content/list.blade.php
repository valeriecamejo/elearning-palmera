@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/products/list') }}">Listado de Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active">Contenidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/contents/create/'.$product_id) }}">Nuevo</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <h5 class="card-title">Listado</h5>
        <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Producto</th>
            <th>Creado</th>
            <th>Acciones</th>
          </tr>
          @foreach ($contents as $content)
          <tr>
            <td>{{ $content->id }}</td>
            <td>{{ $content->name }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $content->created_at }}</td>
            <td>
              <a href="{{ url('/contents/show/'.$content->id) }}" title="Ver">
                <i class="fas fa-eye"></i>
              </a>
              <a href="{{ url('/contents/edit/'.$content->id) }}" title="Editar">
                <i class="fas fa-edit"></i>
              </a>
              <a href="{{ url('/contents/delete/'.$content->id.'/'.$product->id) }}"><i class="fas fa-trash-alt" title="Desactivar"></i></a>
            </td>
          </tr>
          @endforeach
        </table>
        {{ $contents->links() }}
      </div>
    </div>
  </div>
</div>

@endsection