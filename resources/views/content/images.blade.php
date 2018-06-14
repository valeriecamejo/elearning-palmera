<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/buttonBack.js') }}" defer></script>
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <!-- fontawesome -->
    <link href="{{ asset('fontawesome/css/fontawesome-all.css') }}" rel="stylesheet">
    <!-- Vue.js -->
    @if(App::environment('production'))
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    @else
      {!! Html::script('js/vue/vue.js') !!}
      {!! Html::script('js/vue/axios.min.js') !!}
    @endif
</head>
  <body>
    <div>
        <main class="py-4">
          <div class="container-fluid">
            <div class="row justify-content-center">
              <div class="col-md-6">
                @if (session('message'))
                  <div class="alert alert-{{ session('class') }}">
                    {{ session('message') }}
                  </div>
                @endif
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-header">
                    <div class="form-group row">
                      <h3 class="col-md-6">Imagenes guardadas</h3>
                      <a class="col-md-2 offset-md-3  btn btn-primary btn" href="{{ url('/contents/images/add/' . Auth::user()->brand_id) }}">Agregar imagen</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Listado</h5>
                    <div class="row">
                      @foreach ($images as $image)
                      <div class="col-sm-12 col-md-4">
                        <div class="card">
                          <img class="card-img-top" src="{{ asset('storage/marca_' . Auth::user()->brand_id . '/' . $image->file) }}" alt="{{ $image->name }}">
                          <div class="card-body">
                            <h6 class="card-title">
                              <strong>Copia el siguiente link:</strong><br><br>
                              {{ URL::to('/') }}/storage/marca_{{ Auth::user()->brand_id }}/{{ $image->file }}
                            </h6>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                    {{ $images->links() }}
                  </div>
                </div>
              </div>
            </div>
            @yield('content')
          </div>
        </main>
    </div>
  </body>
</html>