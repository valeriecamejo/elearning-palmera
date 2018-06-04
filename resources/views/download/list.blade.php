@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active">Descargables</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/downloads/create/' . $product_id) }}">Nuevo</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <h5 class="card-title">Listado</h5>
          <table class="table table-striped">
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Archivo</th>
              <th>Creado</th>
              <th>Opciones</th>
            </tr>
            @foreach ($downloads as $download)
            <tr>
              <td>{{ $download->id }}</td>
              <td>{{ $download->name }}</td>
              <td>{{ $download->description }}</td>
              <td>{{ $download->created_at }}</td>
              <td>
                <a class="" href="{{ url('/downloads/show/'.$download->id) }}" title="Ver">
                  <i class="fas fa-eye"></i>
                </a>
                <a class="" href="{{ url('/downloads/edit/' . $download->id . '/' . $product_id) }}" title="Editar">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="{{ url('/downloads/delete/'.$download->id . '/' . $product_id) }}"><i class="fas fa-trash-alt" title="Eliminar"></i></a>
              </td>
            </tr>
            @endforeach
          </table>
          {{ $downloads->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
