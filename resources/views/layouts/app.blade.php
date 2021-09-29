<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-person" viewBox="0 0 16 16">
  <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
  <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

					</ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
						<li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif

            @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} {{ Auth::user()->surname }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									@if((Auth::user()->pass_number) === "AA001")
										<a href="/admin" class="dropdown-item">{{ __('Panel administratora') }}</a>
                  @endif
                  <a href="/personalFile/{{Auth::user()->pass_number}}" class="dropdown-item">{{ __('Teczka personalna') }}</a>
                  <a href="/userDocs/{{Auth::user()->pass_number}}" class="dropdown-item">{{ __('Dokumenty') }}</a>
                  <a href="/allextorders/{{Auth::user()->pass_number}}" class="dropdown-item">{{ __('Rozkazy wyjazdu') }}</a>
                  <a href="/tankslst/{{Auth::user()->pass_number}}" class="dropdown-item">{{ __('Czołgi') }}</a>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Wyloguj') }}
                  </a>
                </div>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
@csrf
</form>
              </li>
							@endguest
          </ul>
        </div>
      </div>
    </nav>

    <main class="py-4">
      @yield('content')
    </main>
  </div>
</body>
</html>
