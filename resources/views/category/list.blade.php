@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active">Categorías</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/categories/create') }}">Nueva</a>
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
          </tr>
          @foreach ($categories as $category)
          <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->created_at }}</td>
          </tr>
          @endforeach
        </table>
        {{ $categories->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
