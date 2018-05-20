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
              {{-- <a href="#modal1" data-toggle="modal"><i class="fas fa-trash-alt" title="Desactivar"></i></a> --}}
              {{-- Modal para confirmacion al eliminar un contenido --}}
              {{-- <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <p>Esta seguro que desea eliminar el contenido  <strong> "{{ $content->title }}"</strong></p>
                    </div>
                    <div class="modal-footer">
                      <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                      <a class="btn btn-primary btn" href="{{ url('/contents/delete/'.$content->id) }}">
                        Aceptar
                      </a>
                    </div>
                  </div>
                </div>
              </div> --}}
              {{-- Fin de Modal para confirmacion al eliminar un contenido --}}
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