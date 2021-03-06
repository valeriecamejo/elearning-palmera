@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/incentive-plans') }}">Plan de Incentivos</a>
            </li>
          </ul>
        </div>
          <div class="card-body">
            <form method="POST" action="{{ url('/incentive-plans/content/store/'.$incentive_plan->id) }}">
              @csrf
              <div class="form-group row">
                <label for="name" class="col-md-10 col-form-label text-md"><h2> Términos y Condiciones para <b>{{ $incentive_plan->name }}</b></h2></label>
              </div><br>
              <div class="form-group row">
                <label for="name" class="col-md-6 col-form-label"><h4>{{ __('Carga de contenido') }}</h4></label>
                <a class="col-md-5 text-md-right" href="{{ url('/contents/images/' . Auth::user()->brand_id) }}" target="_blank">
                  <i class="far fa-image">IMÁGENES</i>
                </a><br>
                <div class="col-md-12">
                <textarea class="ckeditor" name="editor1" value="{{ old('editor1') }}" id="editor1" rows="10" cols="80">
                  {!! $incentive_plan->terms_conditions !!}
                </textarea>
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Guardar') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>

@endsection
