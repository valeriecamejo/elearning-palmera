@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				{{ $user->name }} {{ $user->last_name }}
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('users/profile') }}">
					@csrf
					<div class="form-group row">
						<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
						<div class="col-md-6">
              <p class="col-form-label">{{ $user->name }}</p> 
						</div>
					</div>
					<div class="form-group row">
						<label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
						<div class="col-md-6">
              <p class="col-form-label">{{ $user->last_name }}</p> 
						</div>
					</div>
					<div class="form-group row">
						<label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
						<div class="col-md-6">
							<input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}" autofocus>
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
              <p class="col-form-label">{{ $user->dni }}</p> 
						</div>
					</div>
					<div class="form-group row">
						<label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>
						<div class="col-md-6">
							<input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user->phone }}" autofocus>
							@if ($errors->has('phone'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('phone') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
						<div class="col-md-6">
              <p class="col-form-label">{{ $user->email }}</p> 
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
						<div class="col-md-6">
							<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
							@if ($errors->has('password'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>
						<div class="col-md-6">
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation">
						</div>
					</div>
				  <div class="form-group row mb-0">
						<div class="col-md-6 offset-md-4">
							<button type="submit" class="btn btn-primary">
								{{ __('Registrarse') }}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
