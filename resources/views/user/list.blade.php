@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active">Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Nuevo</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <h5 class="card-title">Listado</h5>
        @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif
        <table class="table table-striped">
          <tr>
            <th>Cedula</th>
            <th>Cedula</th>
            <th>Cedula</th>
            <th>Cedula</th>
          </tr>
        </table>

        
        <p class="card-text">Hola terricolas.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>

      </div>
    </div>
  </div>
</div>
@endsection
