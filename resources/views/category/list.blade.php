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
            <th>Activo</th>
            <th>Creado</th>
            <th>Opciones</th>
          </tr>
          @foreach ($categories as $category)
          <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->active ? 'SI' : 'NO' }}</td>
            <td>{{ $category->created_at }}</td>
            <td>
              <a class="" href="{{ url('/categories/show/'.$category->id) }}" title="Ver">
                <i class="fas fa-eye"></i>
              </a>
              <a class="" href="{{ url('/categories/edit/'.$category->id) }}" title="Editar">
                <i class="fas fa-edit"></i>
              </a>
              <a class="" href="{{ url('/categories/active_deactive/'.$category->id) }}" title="Activar / Desactivar">
              @if ($category->active == true)
                <i class="fas fa-minus-circle text-danger"></i>
              @else
                <i class="fas fa-play-circle text-success"></i>
              @endif
              </a>
            </td>
          </tr>
          @endforeach
        </table>
        {{ $categories->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
