@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active">Ventas</a>
          </li>
          @if($permissions->permissions->crear == true)
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/sales/create') }}">Cargar venta</a>
            </li>
          @endif
        </ul>
      </div>
      <div class="card-body">
        <h5 class="card-title">Listado</h5>
        <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Aprobado</th>
            <th>Creado</th>
            <th>Opciones</th>
          </tr>
          @foreach ($sales as $sale)
          <tr>
            <td>{{ $sale->id }}</td>
            <td>{{ $sale->description }}</td>
            <td>{{ $sale->is_approved ? 'SI' : 'NO' }}</td>
            <?php
              $originalDate = $sale->created_at;
              $newDate = date("d/m/Y", strtotime($originalDate));
            ?>
            <td>{{ $newDate }}</td>
            <td>
              @if($permissions->permissions->ver == true)
                <a class="" href="{{ url('/sales/show/'.$sale->id) }}" title="Ver">
                  <i class="fas fa-eye"></i>
                </a>
              @endif
            </td>
          </tr>
          @endforeach
        </table>
        {{ $sales->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
