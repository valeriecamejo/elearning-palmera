@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3>{{ $content->name }}</h3>
      </div>
      <div class="card-body">
        {!! $content->data !!}
        <br><a class="btn btn-primary btn" href="#">Ir a Evaluacion</a>
      </div>
    </div>
  </div>
</div>
@endsection