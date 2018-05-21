@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-10">
  <div class="card">
      @if ($product->photo)
      <img class="card-img-top" src="{{ asset('storage/' .$product->photo) }}" alt="{{ $product->name }}" style="max-heigth: 180px !important">
      @else
      <img class="card-img-top" src="{{ asset('img/sinfoto2.png') }}" alt="{{ $product->name }}" style="max-heigth: 180px !important">
      @endif
			<div class="card-header">
       <h3>{{ $product->name }} </h3>
       <h5>{{ $product->description }} </h5>
			</div>
			<div class="card-body">
          @foreach ($contents as $content)
          {!! $content->data !!}
          @endforeach
	    </div>
      <br><a class="btn btn-primary btn" href="{{ url('/evaluations/product/'.$content->product_id) }}">Ir a Evaluacion</a>

	  </div>
	</div>
</div>
@endsection
