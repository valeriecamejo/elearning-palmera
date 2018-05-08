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
					<li class="nav-item">
						<a class="nav-link active">Nuevo</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<h5 class="card-title">Crear un nuevo producto</h5>
				<form method="POST" action="{{ route('products/create') }}" files=”true” enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
						<div class="col-md-6">
							<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
							@if ($errors->has('name'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
						<div class="col-md-6">
							<textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" rows="3" 
							name="description" value="{{ old('description') }}" maxlength="255" required autofocus> {{ old('description') }} </textarea>
							@if ($errors->has('description'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('description') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="brand_id" class="col-md-4 col-form-label text-md-right">{{ __('Marca') }}</label>
						<div class="col-md-6">
              <select id="brand_id" class="form-control{{ $errors->has('brand_id') ? ' is-invalid' : '' }}" name="brand_id" autofocus required>
                @foreach ($brands as $brand)
                <option value="{{ $brand->id }}"> {{ $brand->name }} </option>
                @endforeach
              </select>
							@if ($errors->has('brand_id'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('brand_id') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Categoría') }}</label>
						<div class="col-md-6">
              <select id="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" autofocus required>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                @endforeach
              </select>
							@if ($errors->has('category_id'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('category_id') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="model" class="col-md-4 col-form-label text-md-right">{{ __('Modelo') }}</label>
						<div class="col-md-6">
							<input id="model" type="text" class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}" name="model" value="{{ old('model') }}" required autofocus>
							@if ($errors->has('model'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('model') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="version" class="col-md-4 col-form-label text-md-right">{{ __('Versión') }}</label>
						<div class="col-md-6">
							<input id="version" type="text" class="form-control{{ $errors->has('version') ? ' is-invalid' : '' }}" name="version" value="{{ old('version') }}" required autofocus>
							@if ($errors->has('version'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('version') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>
						<div class="col-md-6">
							<input type="file" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo">
							@if ($errors->has('photo'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('photo') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="valoration" class="col-md-4 col-form-label text-md-right">{{ __('Valoración / Puntaje') }}</label>
						<div class="col-md-6">
							<input id="valoration" type="text" class="form-control{{ $errors->has('valoration') ? ' is-invalid' : '' }}" name="valoration" value="{{ old('valoration') }}" required autofocus>
							@if ($errors->has('valoration'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('valoration') }}</strong>
								</span>
							@endif
						</div>
					</div><div class="form-group row">
						<label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>
						<div class="col-md-6">
							<input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required autofocus>
							@if ($errors->has('price'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('price') }}</strong>
								</span>
							@endif
						</div>
					</div>
				  <div class="form-group row mb-0">
						<div class="col-md-6 offset-md-4">
							<button type="submit" class="btn btn-primary">
								{{ __('Register') }}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
