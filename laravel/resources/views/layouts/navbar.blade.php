<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="https://laravel.com/img/logomark.min.svg" width="30" height="30" class="d-inline-block align-top"
        alt="{{ __(config('app.name', 'Laravel')) }}">
      {{ __(config('app.name', 'Laravel')) }}</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        <!-- Authentication Links -->
        @auth
        <li class="nav-item {{ (strpos(Route::currentRouteName(), 'dashboard') === 0) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard') }}">
            {{ __('Dashboard') }}<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{ (strpos(Route::currentRouteName(), 'users.index' ) === 0) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('users.index') }}">
            {{ __('Users') }}</a>
        </li>
        @endauth
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}</a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">{{ __('Profile') }}</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
