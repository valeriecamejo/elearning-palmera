@extends('layouts.app')

@section('content')
<div id="city">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/contents') }}">Contenidos</a>
            </li>
          </ul>
        </div>
          <div class="card-body">
          <h5 class="card-title">Carga de contenido</h5>
            <form method="POST" action="{{ url('contents/create') }}">
              @csrf
              <div class="form-group row">
                
                <div class="col-md-12">
                <textarea class="ckeditor" name="editor1" id="editor1" rows="10" cols="80">
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
