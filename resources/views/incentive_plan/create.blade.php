@extends('layouts.app')

@section('content')
<div id="validate">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/incentive-plans') }}">Plan de Incentivos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active">Nueva</a>
            </li>
          </ul>
        </div>
          <div class="card-body">
          <h5 class="card-title">Crear un Plan de Incentivo</h5>
            <form method="POST" action="{{ url('incentive-plans/create') }}">
              @csrf
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Inicio') }}</label>
                <div class="col-md-6">
                  <input id="startDate" width="510" />
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Posee fecha Final') }}</label>
                  <div class="col-md-8">
                    <div class="form-radio-inline">
                    <input type="radio" id="one" name="is_end_date" value="yes" v-model="is_end_date">
                    <label for="one">Si</label>
                    </div>
                    <div class="form-radio-inline">
                      <input type="radio" id="two" name="is_end_date" value="no" v-model="is_end_date" checked>
                      <label for="two">No</label>
                    </div>
                  </div>
              </div>
              <div class="form-group row">
                {{-- <template v-if="is_end_date=='yes'"> --}}
                  <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Fin') }}</label>
                  <div class="col-md-6">
                    <input id="endDate" width="510" />
                  </div>
                {{-- </template> --}}
              </div>
              <div class="form-group row">
                <label for="score" class="col-md-4 col-form-label text-md-right">{{ __('Puntaje') }}</label>
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
                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Incentivo por:') }}</label>
                <div class="col-md-6">
                  <input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') }}" required autofocus>
                  @if ($errors->has('type'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('type') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-md-6 col-form-label"><h4>{{ __('Contenido') }}</h4></label>
                <a class="col-md-5 text-md-right" href="{{ url('/contents/images/' . Auth::user()->brand_id) }}" target="_blank">
                  <i class="far fa-image">Mostrar Imagenes</i>
                </a><br>
                <div class="col-md-12">
                <textarea class="ckeditor" name="editor1" value="{{ old('editor1') }}" id="editor1" rows="10" cols="80" required>
                </textarea>
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Crear') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
{!! Html::script('/js/vueJs/incentive_plan/datepicker_start_end.js') !!}
{!! Html::script('/js/vueJs/incentive_plan/validation.js') !!}
@endsection
