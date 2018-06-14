@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-10">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/brand-news') }}">Noticias</a>
            </li>
          </ul>
      </div>
      <div class="card-body">
        <h3>{{ $brand_new->name }}</h3>
        {!! $brand_new->data !!}
      </div>
    </div>
  </div>
</div>
@endsection