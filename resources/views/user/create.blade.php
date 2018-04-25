@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/users') }}">Usuarios</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active">Nuevo</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<h5 class="card-title">Crear un nuevo usuario</h5>
				<form method="POST" action="{{ route('users/create') }}">
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
						<label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
						<div class="col-md-6">
							<input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>
							@if ($errors->has('last_name'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('last_name') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
						<div class="col-md-6">
							<input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" autofocus>
							@if ($errors->has('username'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('username') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>
						<div class="col-md-6">
							<input id="dni" type="text" class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}" name="dni" value="{{ old('dni') }}" autofocus required>
							@if ($errors->has('dni'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('dni') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>
						<div class="col-md-6">
							<select id="role_id" class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}" name="role_id" autofocus required>
                @foreach ($roles as $rol)
                <option value="{{ $rol->id }}"> {{ $rol->name }} </option>
                @endforeach
              </select>
							@if ($errors->has('role_id'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('role_id') }}</strong>
								</span>
							@endif
						</div>
					</div>
					@if (Auth::user()->role_id == 1)
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
					@else
					{{ Form::hidden('brand_id', Auth::user()->brand_id , array('id' => 'brand_id')) }}
					@endif
					<div class="form-group row">
						<label for="country_id" class="col-md-4 col-form-label text-md-right">{{ __('País') }}</label>
						<div class="col-md-6">
              <select id="country_id" class="form-control{{ $errors->has('country_id') ? ' is-invalid' : '' }}" name="country_id" autofocus required>
                @foreach ($countries as $country)
                <option value="{{ $country->id }}"> {{ $country->name }} </option>
                @endforeach
              </select>
							@if ($errors->has('country_id'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('country_id') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>
						<div class="col-md-6">
							<input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" autofocus>
							@if ($errors->has('phone'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('phone') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
						<div class="col-md-6">
							<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
							@if ($errors->has('email'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
						<div class="col-md-6">
							<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
							@if ($errors->has('password'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
						<div class="col-md-6">
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
