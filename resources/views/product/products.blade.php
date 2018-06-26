@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/products/list') }}">Listado</a>
          </li>
          @if($permissions->permissions->crear == true)
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/products/create') }}">Nuevo</a>
            </li>
          @endif
        </ul>
      </div>
      <div class="card-body">
        <h5 class="card-title">Listado</h5>
        <div class="row">
          @foreach ($products as $product)
          <div class="col-sm-12 col-md-4">
            <div class="card">
              @if ($product->photo)
              <img class="card-img-top" src="{{ asset('./storage/products/'.$product->photo) }}" alt="{{ $product->name }}">
              @else
              <img class="card-img-top" src="{{ asset('img/sinfoto.png') }}" alt="{{ $product->name }}">
              @endif
              <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">
                  {{ $product->description }}
                </p>
                <a href="{{ url('/products/show/'.$product->id) }}" class="btn btn-primary">Ver</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        {{ $products->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
