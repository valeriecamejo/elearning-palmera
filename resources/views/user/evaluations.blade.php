@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        Evaluaciones de {{ $user->name }} {{ $user->last_name }}
      </div>
      <div class="card-body">
        <table class="table table-striped">
          @foreach ($evaluations as $evaluation)
          <tr>
            <td>{{ $evaluation->name }}</td>
            <td>{{ $evaluation->user_evaluation_score }} / {{ $evaluation->score }} pts</td>
            <td>@if($evaluation->approved) Aprobada @else No Aprobada @endif</td>
            <td>
              <a class="btn btn-primary" href="{{ url('/evaluations/user_result/'.$evaluation->user_evaluation_id . '/' . $evaluation->product_id) }}">
                Ver <i class="fa fa-eye"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </table>
        {{ $evaluations->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
