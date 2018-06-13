@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
    <div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/stores') }}">Tiendas</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ url('/stores/deactive_description') }}">
					@csrf
					<div class="form-group row">
            <label for="name" class="col-md-8 col-form-label text-md-right">Motivos para deshabilitar la tienda <b>{{ $store->name }}<b/></label>
            <input type="hidden" name="store_id" value="{{ $store->id }}">
					</div>
					<div class="form-group row">
						<label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
						<div class="col-md-6">
							<textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" rows="3"
								name="description" required autofocus></textarea>
                @if ($errors->has('description'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('description') }}</strong>
								</span>
							  @endif
						</div>
					</div>
				  <div class="form-group row">
						<div class="col-md-6 offset-md-4">
							<button type="submit" class="btn btn-primary">
								{{ __('Deshabilitar') }}
              </button>
              <a type="button" class="btn btn-primary" href="{{ url('/stores') }}">
								{{ __('Regresar') }}
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
