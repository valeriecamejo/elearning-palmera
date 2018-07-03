@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
    <div class="card">
      <div class="card-header">
				{{ $category->name }}
			</div>
			<div class="card-body">
				<div class="form-group row">
					<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
					<div class="col-md-6">
            <p class="col-form-label">{{ $category->name }}</p>
          </div>
				</div>
				<div class="form-group row">
					<label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
					<div class="col-md-6">
            <p class="col-form-label">{{ $category->description }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
