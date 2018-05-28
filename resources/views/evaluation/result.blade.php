@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        Resultado para <b>{{ $evaluation->name }}</b>
      </div>
      <div class="card-body">
        <div class="alert alert-{{ $user_result->approved ? 'success' : 'danger' }}" role="alert">
          <h4 class="alert-heading">Tu Puntaje: </h4>
          <h3> {{ $user_result->score }} / {{ $evaluation->score }} pts</h3>
        </div>
        <h5>Evaluación: @if($user_result->approved) Aprobada @else No Aprobada @endif
        </h5>
      </div>
    </div>
  </div>
</div>
@endsection