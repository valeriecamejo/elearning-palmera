
@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-10">
    <div class="card">
      <div class="card-header">
        <h3> {{ $brand->name }} </h3>
      </div>
      <div class="card-body">
        @foreach ($brand_news as $brand_new)
        <h3>{{ $brand_new->name }}</h3>
        {!! $brand_new->data !!}
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
