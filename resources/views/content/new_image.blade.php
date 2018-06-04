@extends('layouts.app')

@section('content')
<div id="city">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
         <h3>Agregar imagen</h3>
        </div>
        <div class="card-body">
          <form enctype="multipart/form-data" method="POST" action="{{ url('/contents/images/add/' . Auth::user()->brand_id) }}" files=”true” enctype="multipart/form-data">
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
              <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Archivo') }}</label>
              <div class="col-md-6">
                <input type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="file" value="{{ old('name') }}" required>
                <input type="hidden" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="from_content" value="1">
                <input type="hidden" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="description" value="">
                <input type="hidden" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="product_id" value="">
                @if ($errors->has('file'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('file') }}</strong>
                  </span>
                @endif
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
</div>

@endsection
