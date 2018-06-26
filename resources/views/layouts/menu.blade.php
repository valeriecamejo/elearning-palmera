<nav class="navbar navbar-expand-md {{\App\PalmLib\SettingVariables::getSettings('navbar_color') ? \App\PalmLib\SettingVariables::getSettings('navbar_color') : 'navbar-dark bg-dark'}}">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/home') }}">
      {{ config('app.name') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="menu" class="collapse navbar-collapse" id="navbarSupportedContent">
      <template v-if="ready==true">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
      <!-- Menu hacia la IZQ -->
      </ul>
      <!-- Right Side Of Navbar -->
      <ul v-for="user_permission in user_permissions" :value="user_permission.id" class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
          <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
        @else
          <li v-if="user_permission.is_config==false">
            <a class="nav-link" :href="user_permission.path">
              @{{ user_permission.name }}
            </a>
          </li>
      </ul>
      <!-- User's Dropdown -->
          <div class="nav-item dropdown navbar-nav ml-auto">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div v-for="user_permission in user_permissions" :value="user_permission.id" class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url('/users/profile') }}">
                Perfil
              </a>
              <a class="dropdown-item" href="{{ url('users/'.Auth::user()->id.'/evaluations') }}">
                Mis Evaluaciones
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </div>
      <!-- End User's Dropdown -->
        <template v-if="user_permissions.length>0">
          <div class="nav-item dropdown navbar-nav ml-auto">
            <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              <i class="fas fa-cogs"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a v-for="user_permission in user_permissions" v-if="user_permission.is_config==true" :value="user_permission.id" class="dropdown-item" :href="user_permission.path">
                @{{ user_permission.name }}
              </a>
            </div>
          </div>
        </template>
        @endguest
      </template>
    </div>
  </div>
</nav>

{!! Html::script('/js/vueJs/menu/menu.js') !!}