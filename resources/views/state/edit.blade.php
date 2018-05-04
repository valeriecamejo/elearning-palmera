@extends('layouts.app')

@section('content')
<div id="state">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs">
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/states') }}">Estados</a>
						</li>
					</ul>
				</div>
				<template v-if="data_ready == true">
					<div class="card-body">
					<h5>Editar pais {{ $state->name }} </h5>
						<form method="POST" action="{{ url('states/edit/'.$state->id) }}">
							@csrf
							<div class="form-group row">
								<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
								<div class="col-md-6">
									<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $state->name }}" required autofocus>
									@if ($errors->has('name'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Pais') }}</label>
                <div class="col-md-6">
                  <select v-model="country_id" name="country_id" class="form-control" required>
                    <option disabled value="">Seleccione</option>
                    <option v-for="country in countries" :value="country.id">
                        @{{ country.name }}
                    </option>
                  </select>
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
				</template>
			</div>
		</div>
	</div>
</div>

{!! Html::script('/js/vueJs/state/create.js') !!}
@endsection
