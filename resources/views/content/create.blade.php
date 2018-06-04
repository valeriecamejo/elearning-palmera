@extends('layouts.app')

@section('content')
<div id="city">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('contents/'.$product->id) }}">Contenidos</a>
            </li>
          </ul>
        </div>
          <div class="card-body">
          <h3><strong>Contenido para {{ $product->name }} </strong></h3><br>
            <form method="POST" action="{{ url('/contents/create/'.$product->id) }}">
              @csrf
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md"><h4>{{ __('Titulo') }}</h4></label>
                <div class="col-md-12">
                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                  @if ($errors->has('name'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
              </div><br>
              <div class="form-group row">
                <label for="name" class="col-md-6 col-form-label"><h4>{{ __('Carga de contenido') }}</h4></label>
                <a class="col-md-5 text-md-right" href="{{ url('/contents/images/' . Auth::user()->brand_id) }}" target="_blank">
                  <i class="far fa-image">IMÁGENES</i>
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

@endsection
