@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active">Plan de Incentivos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/incentive-plans/create') }}">Nuevo</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <h5 class="card-title">Listado</h5>
        <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Incentivo por</th>
            <th>Puntuacion</th>
            <th>Fecha de Inicio</th>
            <th>Acciones</th>
          </tr>
          @foreach ($incentive_plans as $incentive_plan)
          <tr>
            <td>{{ $incentive_plan->id }}</td>
            <td>{{ $incentive_plan->name }}</td>
            <td>{{ $incentive_plan->type }}</td>
            <td>{{ $incentive_plan->score }}</td>
            <td>{{ $incentive_plan->start_date }}</td>
            <td>
              <a href="{{ url('/incentive-plans/show/'.$incentive_plan->id) }}" title="Ver">
                <i class="fas fa-eye"></i>
              </a>
              <a href="{{ url('/incentive-plans/edit/'.$incentive_plan->id) }}" title="Editar">
                <i class="fas fa-edit"></i>
              </a>
              <a href="{{ url('/incentive-plans/deactive_description/'.$incentive_plan->id) }}">
              @if ($incentive_plan->active == true)
                <i class="fas fa-minus-circle text-danger" title="Desactivar"></i>
              @else
                <i class="fas fa-play-circle text-success" title="Activar"></i>
              @endif
              </a>
            </td>
          </tr>
          @endforeach
        </table>
        {{ $incentive_plans->links() }}
      </div>
    </div>
  </div>
</div>
@endsection