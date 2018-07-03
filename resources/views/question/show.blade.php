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
        </ul>
			</div>
			<div class="card-body">
        <h5 class="card-title">{{ $question->question }}</h5>
        <div class="form-group row">
          <div class="col-md-12">
            <p class="col-form-label"> Valor: {{ $question->score }}</p>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-12">
            <p class="col-form-label"> Pregunta
              @if ($question->type_question_id == 1)
                Simple
              @elseif ($question->type_question_id == 2)
                Multiple
              @elseif ($question->type_question_id == 3)
                Libre
              @endif
            </p>
          </div>
        </div>
        <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>Respuesta</th>
            <th>Es Correcta?</th>
            <th>Creado</th>
            <th>Opciones</th>
          </tr>
          @foreach ($answers as $answer)
          <tr>
            <td>{{ $answer->id }}</td>
            <td>{{ $answer->answer }}</td>
            <td>
            {{ $answer->correct ? 'SI' : 'NO' }}
            </td>
            <td>{{ $answer->created_at }}</td>
            <td>
              <a href="{{ url('/evaluations/'.$id.'/questions/'.$question->id.'/answers/edit/'.$answer->id) }}" title="Editar">
                <i class="fas fa-edit"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </table>
        {{ $answers->links() }}
			</div>
		</div>
	</div>
</div>
@endsection
