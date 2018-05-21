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
        {{ $evaluation->name }}
			</div>
      <div class="card-body">
      <form method="POST" action="{{ url('/evaluations/'.$id) }}">
					@csrf
        <div class="form-group row">
          <div class="col-md-12">
            <p class="col-form-label">{{ $evaluation->description }}</p>						
          </div>
        </div>
        @foreach ($questions_answers as $key => $question)
        <ul class="list-group">
          <li class="list-group-item list-group-item-action active">{{ $question['question'] }}</li>
          @foreach ($question['answers'] as $key_ => $answer)
            @if($question['type_question_id'] == 1)
            <li class="list-group-item d-flex justify-content-between align-items-center">
              {{ $answer['answer'] }}
              <span class="badge badge-default badge-pill">
                <input type="radio" name="result[{{$question['question_id']}}][{{$answer['id']}}]" value="{{$answer['id']}}">
              </span>
            </li>
            @elseif($question['type_question_id'] == 2)
            <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $answer['answer'] }}
              <span class="badge badge-default badge-pill">
                <input type="checkbox" name="result[{{$question['question_id']}}][{{$answer['id']}}]" value="{{$answer['id']}}">
              </span>
            </li>
            @endif
          @endforeach
        </ul>
        <br>
        @endforeach
        <button type="submit" class="btn btn-success">
          {{ __('Terminar') }}
        </button>
				</form>
      </div>
    </div>
  </div>
</div>
@endsection
