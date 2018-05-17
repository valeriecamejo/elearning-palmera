@extends('layouts.app')

@section('content')
<div id="city">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('contents/'.$product_id) }}">Contenidos</a>
            </li>
          </ul>
        </div>
          <div class="card-body">
            <form method="POST" action="{{ url('/contents/create/'.$product_id) }}">
              @csrf
              <div class="form-group row">
                <label for="name" class="col-md-12 col-form-label"><h4>{{ __('Titulo') }}</h4></label>
                <div class="col-md-12">
                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                  @if ($errors->has('name'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                <label for="name" class="col-md-12 col-form-label"><h4>{{ __('Carga de contenido') }}</h4></label><br>
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

@endsection
