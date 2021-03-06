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
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script> --}}
    <!-- Axios and VueJs -->
    @if(App::environment('production'))
      <script src="https://unpkg.com/vue"></script>
      <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    @else
    {!! Html::script('js/vue/vue.js') !!}
      {!! Html::script('js/vue/axios.min.js') !!}
    @endif
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/buttonBack.js') }}" defer></script>
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <!-- fontawesome -->
    <link href="{{ asset('fontawesome/css/fontawesome-all.css') }}" rel="stylesheet">
    @if(App::environment('production'))
    <script src="{{ asset('js/configGlobal.js') }}"></script>
    @else
      <script src="{{ asset('js/configGlobalLocal.js') }}"></script>
    @endif
</head>
  <body>
    <div>
        @include('layouts.menu')
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
            <div>
              <a id="back" class="text-dark" onclick="goBack()">
                <i class="fas fa-arrow-left"></i>
              </a>
            </div>
            @yield('content')
          </div>
        </main>
    </div>
  </body>
</html>

