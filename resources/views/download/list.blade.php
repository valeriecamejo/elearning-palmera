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
            <a class="nav-link" href="{{ url('/downloads/create') }}">Nuevo</a>
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
              <a class="" href="{{ url('/downloads/edit/'.$download->id) }}" title="Editar">
                <i class="fas fa-edit"></i>
              </a>
              <a href="#modal1" data-toggle="modal"><i class="fas fa-trash-alt" title="Eliminar"></i></a>
              {{-- Modal para confirmacion al eliminar un contenido --}}
              <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <p>Esta seguro que desea eliminar el archivo  <strong> "{{ $download->name }}"</strong></p>
                    </div>
                    <div class="modal-footer">
                      <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                      <a class="btn btn-primary btn" href="{{ url('/download/delete/'.$download->id) }}">
                        Aceptar
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              {{-- Fin de Modal para confirmacion al eliminar un contenido --}}
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
