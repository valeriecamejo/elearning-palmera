@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
    <div class="card">
			<div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/evaluations/'.$id.'/questions/create') }}" >Volver a la Evaluación</a>
					</li>
          <li class="nav-item">
						<a class="nav-link active">Editar Respuesta</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ url('/evaluations/'.$id.'/questions/'.$question_id.'/answers/edit/'.$answer->id) }}">
					@csrf
					<div class="form-group row">
						<label for="answer" class="col-md-4 col-form-label text-md-right">{{ __('Respuesta') }}</label>
						<div class="col-md-6">
							<input id="answer" type="text" class="form-control{{ $errors->has('answer') ? ' is-invalid' : '' }}" name="answer" value="{{ $answer->answer }}" required autofocus>
							@if ($errors->has('answer'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('answer') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="correct" class="col-md-4 col-form-label text-md-right">{{ __('¿Es Correcta?') }}</label>
						<div class="col-md-6">
							<input type="checkbox" class="form-control{{ $errors->has('correct') ? ' is-invalid' : '' }}" name="correct" @if ($answer->correct == 1) checked value="1" @endif >
							@if ($errors->has('correct'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('correct') }}</strong>
								</span>
							@endif
						</div>
					</div>
				  <div class="form-group row mb-0">
						<div class="col-md-6 offset-md-4">
							<button type="submit" class="btn btn-primary">
								{{ __('Actualizar') }}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
