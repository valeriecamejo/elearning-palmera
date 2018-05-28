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
						<a class="nav-link active">Editar Pregunta</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ url('/evaluations/'.$id.'/questions/edit/'.$question->id) }}">
					@csrf
					<div class="form-group row">
						<label for="question" class="col-md-4 col-form-label text-md-right">{{ __('Pregunta') }}</label>
						<div class="col-md-6">
							<input id="question" type="text" class="form-control{{ $errors->has('question') ? ' is-invalid' : '' }}" name="question" value="{{ $question->question }}" required autofocus>
							@if ($errors->has('question'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('question') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="score" class="col-md-4 col-form-label text-md-right">{{ __('Valor') }}</label>
						<div class="col-md-6">
							<input id="score" type="text" class="form-control{{ $errors->has('score') ? ' is-invalid' : '' }}" name="score" value="{{ $question->score }}" required autofocus>
							@if ($errors->has('score'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('score') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="type_question_id" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Pregunta') }}</label>
						<div class="col-md-6">
							<select id="type_question_id" class="form-control{{ $errors->has('type_question_id') ? ' is-invalid' : '' }}" 
                name="type_question_id" autofocus required>
                <option value="1"
                  @if ($question->type_question_id == 1)
                    selected
                  @endif > Simple </option>
                <option value="2" @if ($question->type_question_id == 2)
                    selected
                  @endif > Multiple </option>
                <!-- <option value="3" @if ($question->type_question_id == 3)
                    selected
                  @endif > Libre </option> -->
              </select>
							@if ($errors->has('type_question_id'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('type_question_id') }}</strong>
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
