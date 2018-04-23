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
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/products/create') }}">Nuevo</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <h5 class="card-title">Listado</h5>
        <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Valoración/Puntaje</th>
            <th>Creado</th>
          </tr>
          @foreach ($products as $product)
          <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->valoration }}</td>
            <td>{{ $product->created_at }}</td>
          </tr>
          @endforeach
        </table>
        {{ $products->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
