@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				{{ $user->name }} {{ $user->last_name }}
			</div>
			<div class="card-body">
				<h5 class="card-title">Detalles del usuario</h5>
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
            <p class="col-form-label">{{ $user->username }}</p>
					</div>
				</div>
				<div class="form-group row">
					<label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>
					<div class="col-md-6">
            <p class="col-form-label">{{ $user->dni }}</p>
					</div>
				</div>
        <div class="form-group row">
					<label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('Marca') }}</label>
					<div class="col-md-6">
            <p class="col-form-label">{{ $brand->name }}</p>
					</div>
				</div>
        <div class="form-group row">
					<label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('País') }}</label>
					<div class="col-md-6">
            <p class="col-form-label">{{ $country->name }}</p>
					</div>
				</div>
        <div class="form-group row">
					<label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>
					<div class="col-md-6">
            <p class="col-form-label">{{ $role->name }}</p>
					</div>
				</div>
				<div class="form-group row">
				<label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>
					<div class="col-md-6">
            <p class="col-form-label">{{ $user->phone }}</p>
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
					<div class="col-md-6">
            <p class="col-form-label">{{ $user->email }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
