@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
            <a class="nav-link" href="{{ url('/downloads') }}">Listado</a>
          </li>
					<li class="nav-item">
						<a class="nav-link active">Nuevo</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<h5 class="card-title">Cargar un Archivo</h5>
				<form enctype="multipart/form-data" method="POST" action="{{ url('downloads/create') }}" files=”true” enctype="multipart/form-data">
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
						<label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Archivo') }}</label>
						<div class="col-md-6">
							<input type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="file" value="{{ old('name') }}" required>
							<input type="hidden" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="from_content" value="0">
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
