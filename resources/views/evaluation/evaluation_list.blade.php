@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        Evaluaciones para {{ $product->name }}
      </div>
      <div class="card-body">
        <div class="alert alert-info" role="alert">
          <h4 class="alert-heading">Atención  <i class="fa fa-exclamation-circle"></i></h4>
          Solo continue si esta seguro de hacer la evaluacón elegida.
        </div>
        <table class="table table-striped">
          @foreach ($evaluations as $evaluation)
          <tr>
            <td>{{ $evaluation->name }}</td>
            <td>
              <a class="btn btn-success" href="{{ url('/evaluations/'.$evaluation->id) }}">
                Continuar <i class="fa fa-play-circle"></i>
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
