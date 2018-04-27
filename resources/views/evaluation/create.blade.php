@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/evaluations') }}">Evaluaciones</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active">Nueva</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<h5 class="card-title">Crear una Evaluación</h5>
				<form method="POST" action="{{ route('evaluations/create') }}">
					@csrf
					<div class="form-group row">
						<label for="product_id" class="col-md-4 col-form-label text-md-right">{{ __('Producto') }}</label>
						<div class="col-md-6">
							<select id="product_id" class="form-control{{ $errors->has('product_id') ? ' is-invalid' : '' }}" name="product_id" autofocus required>
                @foreach ($products as $product)
                <option value="{{ $product->id }}"> {{ $product->name }} </option>
                @endforeach
              </select>
							@if ($errors->has('product_id'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('product_id') }}</strong>
								</span>
							@endif
						</div>
					</div>
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
								name="description" value="{{ old('description') }}" required autofocus></textarea>							@if ($errors->has('description'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('description') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="score" class="col-md-4 col-form-label text-md-right">{{ __('Puntaje Total') }}</label>
						<div class="col-md-6">
							<input id="score" type="text" class="form-control{{ $errors->has('score') ? ' is-invalid' : '' }}" name="score" value="{{ old('score') }}" autofocus>
							@if ($errors->has('score'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('score') }}</strong>
								</span>
							@endif
						</div>
					</div>
          <div class="form-group row">
						<label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>
						<div class="col-md-6">
							<input id="photo" type="text" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" value="{{ old('photo') }}" autofocus>
							@if ($errors->has('photo'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('photo') }}</strong>
								</span>
							@endif
						</div>
					</div>
				  <div class="form-group row mb-0">
						<div class="col-md-6 offset-md-4">
							<button type="submit" class="btn btn-primary">
								{{ __('Guardar') }}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
