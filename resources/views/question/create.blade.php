@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/evaluations') }}" >Evaluaciones</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/evaluations/show/'.$evaluation->id) }}" >{{ $evaluation->name }}</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active">Preguntas</a>
					</li>
				</ul>
			</div>
			<div class="card-body" id="question">
				<h5 class="card-title">Crear nueva pregunta</h5>
				<form method="POST" action="{{ url('/evaluations/'.$id.'/questions/create') }}">
					@csrf
					<div class="form-group row">
						<label for="question" class="col-md-4 col-form-label text-md-right">{{ __('Pregunta') }}</label>
						<div class="col-md-6">
							<input id="question" type="text" class="form-control{{ $errors->has('question') ? ' is-invalid' : '' }}" name="question" value="{{ old('question') }}" required autofocus>
							@if ($errors->has('question'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('question') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="score" class="col-md-4 col-form-label text-md-right">{{ __('Puntaje / Valor') }}</label>
						<div class="col-md-6">
							<input id="score" type="text" class="form-control{{ $errors->has('score') ? ' is-invalid' : '' }}" name="score" value="{{ old('score') }}" required autofocus>
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
							<select v-model="type_question_id" id="type_question_id" 
                      class="form-control{{ $errors->has('type_question_id') ? ' is-invalid' : '' }}" 
                      name="type_question_id" autofocus required @change="refresh">
                <option value="1"> Simple </option>
                <option value="2"> Multiple </option>
                <!-- <option value="3"> Libre </option> -->s
              </select>
							@if ($errors->has('type_question_id'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('type_question_id') }}</strong>
								</span>
							@endif
						</div>
					</div>
          <!-- Respuestas -->
            <template v-if="type_question_id == 1 || type_question_id == 2">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Opciones de respuestas ( @{{ fields }} \ @{{ limit }} ) </h5>
                  <div v-for="field in fields">
                    <div class="form-group row">
                      <label for="answer" class="col-md-4 col-form-label text-md-right">{{ __('Opción') }} @{{ field }}</label>
                      <div class="col-md-5">
                        <input  type="text" class="form-control" name="answer[]" required>
                      </div>
                      <div class="col-md-1" v-if="type_question_id == 2">
                        <input type="checkbox" class="form-check-input" name="correct[]" v-model="correct" :value="field">
                      </div>
                      <div class="col-md-1" v-if="type_question_id == 1">
                        <input type="radio" class="form-check-input" name="correct[]" v-model="correct" :value="field">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                      <a class="btn btn-success text-light" @click="addField">
                        Agregar más opciones <li class="fa fa-plus"></li>
                      </a>
                      <a class="btn btn-danger text-light" @click="deleteField">
                        Quitar opción <li class="fa fa-minus"></li>
                      </a>
                    </div>
                  </div> 
                </div>
              </div>
            </template>
          <!-- Fin Respuestas -->
          <template  v-if="correct != false || type_question_id == 3">
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <br>
                <button type="submit" class="btn btn-primary">
                  {{ __('Guardar todo') }}
                </button>
              </div>
            </div>
          </template>
				</form>
			</div>
		</div>
    <br>
    <div class="card">
			<div class="card-header">
        Preguntas para {{ $evaluation->name }}
			</div>
			<div class="card-body">
        <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>Pregunta</th>
            <th>Tipo de Pregunta</th>
            <th>Creado</th>
            <th>Opciones</th>
          </tr>
          @foreach ($questions as $question)
          <tr>
            <td>{{ $question->id }}</td>
            <td>{{ $question->question }}</td>
            <td>
              @if ($question->type_question_id == 1)
                Simple
              @elseif ($question->type_question_id == 2)
                Multiple
              @elseif ($question->type_question_id == 3)
                Libre
              @endif
            </td>
            <td>{{ $question->created_at }}</td>
            <td>
              <a href="{{ url('/evaluations/'.$id.'/questions/show/'.$question->id) }}" title="Ver">
                <i class="fas fa-eye"></i>
              </a>
              <a href="{{ url('/evaluations/'.$id.'/questions/edit/'.$question->id) }}" title="Editar">
                <i class="fas fa-edit"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </table>
        {{ $questions->links() }}
	    </div>
	  </div>
	</div>
</div>
{!! Html::script('/js/question.js') !!}
@endsection
