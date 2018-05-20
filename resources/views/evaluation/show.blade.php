@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
  <div class="card">
    @if ($evaluation->photo)
    <img class="card-img-top" src="{{ asset('storage/evaluation/'.$evaluation->photo) }}" alt="{{ $evaluation->name }}" style="max-heigth: 180px !important">
    @else
    <img class="card-img-top" src="{{ asset('img/sinfoto2.png') }}" alt="{{ $evaluation->name }}" style="max-heigth: 180px !important">
    @endif
			<div class="card-header">
        Preguntas para {{ $evaluation->name }}
			</div>
			<div class="card-body">
        <div class="form-group row">
          <div class="col-md-12">
            <p class="col-form-label">{{ $product->name }}</p>						
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-12">
            <p class="col-form-label">{{ $evaluation->description }}</p>						
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-6">
            <p class="col-form-label">Puntos totales:  {{ $evaluation->score }}</p>						
          </div>
        </div>
        <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>Pregunta</th>
            <th>Tipo de Pregunta</th>
            <th>Creado</th>
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
          </tr>
          @endforeach
        </table>
        {{ $questions->links() }}
	    </div>
	  </div>
	</div>
</div>
@endsection
