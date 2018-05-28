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
				</ul>
			</div>
			<div class="card-body">
				<h5 class="card-title">Reporte de venta</h5>
        <div class="form-group row">
						<label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Producto') }}</label>
						<div class="col-md-6">
            <p class="col-form-label">{{ $product->name }}</p>
						</div>
					</div>
          <div class="form-group row">
						<label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Tienda') }}</label>
						<div class="col-md-6">
            <p class="col-form-label">{{ $sale->store }}</p>
						</div>
					</div>
					<div class="form-group row">
						<label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
						<div class="col-md-6">
            <p class="col-form-label">{{ $sale->description }}</p>
						</div>
					</div>
          <div class="form-group row">
						<label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad') }}</label>
						<div class="col-md-6">
            <p class="col-form-label">{{ $sale->quantity }}</p>
						</div>
					</div>
          <div class="form-group row">
						<label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Código o Referencia') }}</label>
						<div class="col-md-6">
            <p class="col-form-label">{{ $sale->reference }}</p>
						</div>
					</div>
          <div class="form-group row">
						<label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Soporte de venta') }}</label>
						<div class="col-md-6">
							<a href="{{ asset('storage/sale_'.Auth::user()->brand_id.'/' . $sale->file) }}"  target="_blank">
							<li class="fa fa-eye"></li> Ver soporte
            	</a>
						</div>
					</div>
					<div class="form-group row">
						<label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Estatus') }}</label>
						<div class="col-md-6">
							{{ $sale->is_approved ? 'APROBADO' : 'NO APROBADO' }}
						</div>
					</div>
				  <div class="form-group row mb-0">
						<div class="col-md-6 offset-md-4">
							<a class="btn btn-success text-light" href="{{ url('/sales/approve_disapprove/'.$sale->id.'/1') }}">
								{{ __('Aprobar Venta') }}
							</a>
							<a class="btn btn-danger text-light" href="{{ url('/sales/approve_disapprove/'.$sale->id.'/0') }}">
								{{ __('No Aprobar Venta') }}
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
