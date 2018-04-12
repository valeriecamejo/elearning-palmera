@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active">Maracas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/brands/create') }}">Nueva</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <h5 class="card-title">Listado</h5>
        <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Color de Menú</th>
            <th>Logo</th>
            <th>Imagen Header</th>
            <th>Creado</th>
          </tr>
          @foreach ($brands as $brand)
          <tr>
            <td>{{ $brand->id }}</td>
            <td>{{ $brand->name }}</td>
            <td>{{ $brand->navbar_color }}</td>
            <td>{{ $brand->logo }}</td>
            <td>{{ $brand->header }}</td>
            <td>{{ $brand->created_at }}</td>
          </tr>
          @endforeach
        </table>
        {{ $brands->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
