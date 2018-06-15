@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/sales') }}">Ventas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active">Cargar venta</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<h5 class="card-title">Reporte de venta</h5>
				<form method="POST" action="{{ route('sales/create') }}" files=”true” enctype="multipart/form-data">
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
						<label for="store" class="col-md-4 col-form-label text-md-right">{{ __('Tienda') }}</label>
						<div class="col-md-6">
							<select id="store_id" class="form-control{{ $errors->has('store_id') ? ' is-invalid' : '' }}" name="store_id" autofocus required>
                @foreach ($stores as $store)
                <option value="{{ $store->id }}"> {{ $store->name }} </option>
                @endforeach
              </select>
							@if ($errors->has('store'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('store') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
						<div class="col-md-6">
							<textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" rows="3"
								name="description" required autofocus>{{ old('description') }}</textarea>
						@if ($errors->has('description'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('description') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de la venta') }}</label>
						<div class="col-md-6">
							<div id="app"></div>
							@if ($errors->has('date'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('date') }}</strong>
								</span>
							@endif
						</div>
					</div>
          <div id="button" class="form-group row">
						<label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad') }}</label>
						<div class="col-md-6">
							<input id="quantity" type="number" min="1" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" value="{{ old('quantity') }}" required autofocus>
							@if ($errors->has('quantity'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('quantity') }}</strong>
								</span>
							@endif
						</div>
					</div>
          <div class="form-group row">
						<label for="reference" class="col-md-4 col-form-label text-md-right">{{ __('Código o Referencia') }}</label>
						<div class="col-md-6">
							<input id="reference" type="text" class="form-control{{ $errors->has('reference') ? ' is-invalid' : '' }}" name="reference" value="{{ old('reference') }}" required autofocus>
							@if ($errors->has('reference'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('reference') }}</strong>
								</span>
							@endif
						</div>
					</div>
          <div class="form-group row">
						<label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Soporte de venta') }}</label>
						<div class="col-md-6">
							<input type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="file" require>
							@if ($errors->has('file'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('file') }}</strong>
								</span>
							@endif
						</div>
					</div>
				  <div class="form-group row mb-0">
						<div class="col-md-6 offset-md-4">
							<button type="submit" class="btn btn-primary">
								{{ __('Cargar Venta') }}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
	<script type="text/x-template" id="demo-template">
		<div>
			<datepicker v-model="value" required></datepicker>
		</div>
	</script>
	<script type="text/x-template" id="datepicker-template">
		<input type="text" name="date" width="400" />
	</script>
	{!! Html::script('/js/vueJs/sale/datepicker.js') !!}
@endsection
