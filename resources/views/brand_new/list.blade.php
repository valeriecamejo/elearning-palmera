@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active">Noticias</a>
          </li>
          @if($permissions->permissions->crear == true)
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/brand-news/create') }}">Nueva</a>
            </li>
          @endif
        </ul>
      </div>
      <div class="card-body">
        <h5 class="card-title">Listado</h5>
        <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Creado</th>
            <th>Acciones</th>
          </tr>
          @foreach ($brand_news as $brand_new)
          <tr>
            <td>{{ $brand_new->id }}</td>
            <td>{{ $brand_new->name }}</td>
            <td>{{ $brand_new->created_at }}</td>
            <td>
              @if($permissions->permissions->ver == true)
                <a href="{{ url('/brand-news/show/'.$brand_new->id) }}" title="Ver">
                  <i class="fas fa-eye"></i>
                </a>
              @endif
              @if($permissions->permissions->editar == true)
                <a href="{{ url('/brand-news/edit/'.$brand_new->id) }}" title="Editar">
                  <i class="fas fa-edit"></i>
                </a>
              @endif
              @if($permissions->permissions->eliminar == true)
                <a class="" href="{{ url('/brand-news/active_deactive/'.$brand_new->id) }}" >
                @if ($brand_new->active == true)
                  <i class="fas fa-minus-circle text-danger" title="Desactivar"></i>
                @else
                  <i class="fas fa-play-circle text-success" title="Activar"></i>
                @endif
                </a>
                <a href="{{ url('/brand-news/delete/'.$brand_new->id) }}"><i class="fas fa-trash-alt" title="Eliminar"></i></a>
              @endif
            </td>
          </tr>
          @endforeach
        </table>
        {{ $brand_news->links() }}
      </div>
    </div>
  </div>
</div>

@endsection