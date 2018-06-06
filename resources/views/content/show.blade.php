@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('contents/'.$content->product_id) }}">Contenidos</a>
            </li>
          </ul>
      </div>
      <div class="card-body">
        <h3>{{ $content->name }}</h3>
        {!! $content->data !!}
      </div>
    </div>
  </div>
</div>
@endsection