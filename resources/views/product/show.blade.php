@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/products') }}">Productos</a>
					</li>
					<li class="nav-item">
            <a class="nav-link" href="{{ url('/products/list') }}">Listado</a>
          </li>
				</ul>
			</div>
			<div class="card-body">
				<h3>{{ $product->name }}</h3>
				<div class="form-group row">
					<label for="photo" class="col-md-4 col-form-label text-md-right"></label>
					<div class="col-md-6">
						@if ($product->photo)
            <img class="card-img-top" src="{{ asset('storage/'.$product->photo) }}" alt="{{ $product->name }}">
            @else
            <img class="card-img-top" src="{{ asset('img/sinfoto.png') }}" alt="{{ $product->name }}">
            @endif
					</div>
					</div>
					<div class="form-group row">
						<label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
						<div class="col-md-6">
            <p class="col-form-label">{{ $product->description }}</p>
						</div>
					</div>
					<div class="form-group row">
						<label for="brand_id" class="col-md-4 col-form-label text-md-right">{{ __('Marca') }}</label>
						<div class="col-md-6">
            <p class="col-form-label">
              @foreach ($brands as $brand)
                  @if ($product->brand_id == $brand->id)
                  {{ $brand->name }}
                  @endif
              @endforeach
            </p>
						</div>
					</div>
					<div class="form-group row">
						<label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Categoría') }}</label>
						<div class="col-md-6">
              @foreach ($categories as $category)
                @if ($product->category_id == $category->id)
                {{ $category->name }}
                @endif
              @endforeach
            </p>
						</div>
					</div>
					<div class="form-group row">
						<label for="model" class="col-md-4 col-form-label text-md-right">{{ __('Modelo') }}</label>
						<div class="col-md-6">
            <p class="col-form-label">{{ $product->model }}</p>
						</div>
					</div>
					<div class="form-group row">
						<label for="version" class="col-md-4 col-form-label text-md-right">{{ __('Versión') }}</label>
						<div class="col-md-6">
            <p class="col-form-label">{{ $product->version }}</p>
						</div>
					</div>
					<div class="form-group row">
						<label for="valoration" class="col-md-4 col-form-label text-md-right">{{ __('Valoración / Puntaje') }}</label>
						<div class="col-md-6">
            <p class="col-form-label">{{ $product->valoration }}</p>
						</div>
					</div><div class="form-group row">
						<label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>
						<div class="col-md-6">
            <p class="col-form-label">{{ $product->price }}</p>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection
