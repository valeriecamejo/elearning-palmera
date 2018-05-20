@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active">Evaluaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/evaluations/create') }}">Nueva</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <h5 class="card-title">Listado</h5>
        <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Puntaje total</th>
            <th>Creado</th>
            <th>Opciones</th>
          </tr>
          @foreach ($evaluations as $evaluation)
          <tr>
            <td>{{ $evaluation->id }}</td>
            <td>{{ $evaluation->name }}</td>
            <td>{{ $evaluation->score }} pts</td>
            <td>{{ $evaluation->created_at }}</td>
            <td>
              <a href="{{ url('/evaluations/show/'.$evaluation->id) }}" title="Ver">
                <i class="fa fa-eye"></i>
              </a>
              <a  href="{{ url('/evaluations/edit/'.$evaluation->id) }}" title="Editar">
                <i class="fa fa-edit"></i>
              </a>
              <a href="{{ url('/evaluations/'.$evaluation->id.'/questions/create') }}" title="Gestión de Preguntas">
                <i class="fa fa-spinner"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </table>
        {{ $evaluations->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
