@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
  <div class="card">
  
      <img class="card-img-top" src="{{ asset('img/sinfoto2.png') }}" alt="{{ $evaluation->name }}" style="max-heigth: 180px !important">

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
              <a href="" title="Ver">
                <i class="fas fa-eye"></i>
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
@endsection
