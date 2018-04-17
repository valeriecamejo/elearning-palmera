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
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
            @yield('content')
          </div>
        </main>
    </div>
  </body>
</html>
