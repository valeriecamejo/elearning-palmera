@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
        <h4>Editar pais {{ $country->name }} </h4>
			</div>
			<div class="card-body">
				<h5 class="card-title">Crear un nuevo país</h5>
				<form method="POST" action="{{ url('countries/edit/'.$country->id) }}">
					@csrf
					<div class="form-group row">
						<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
						<div class="col-md-6">
							<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $country->name }}" required autofocus>
							@if ($errors->has('name'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('Nickname') }}</label>
						<div class="col-md-6">
							<input id="nickname" type="text" class="form-control{{ $errors->has('nickname') ? ' is-invalid' : '' }}" name="nickname" value="{{ $country->nickname }}" required autofocus>
							@if ($errors->has('nickname'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('nickname') }}</strong>
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
