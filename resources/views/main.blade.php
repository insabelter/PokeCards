<!DOCTYPE html>
<html>
    <head>
        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <title>Pok&eacute;Cards @yield('title')</title>

        <script src="{{asset('js/app.js')}}" defer></script>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/theme.css')}}">
    </head>
    <body>
        <div id="page-container">
            <header>
                <nav class="navbar navbar-expand-md navbar-light fixed-top">
                    <a href="{{ route('start') }}"><img src="https://fontmeme.com/permalink/210514/7380c713c6ccc27634273d42b7c170f1.png" alt="pokemon-schriftart" border="0" height="60"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav ml-auto">
                            <li class="btn btn-primary btn-sm nav-button dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Trading
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" style="margin: 0.5rem 0 0;" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('marketplace') }}">Marketplace</a>
                                    <a class="dropdown-item" href="{{ route('watchlist') }}">Watchlist</a>
                                    <a class="dropdown-item" href="{{ route('offers') }}">Your Offers</a>
                                </div>
                            </li>
                            <li class="btn btn-primary btn-sm nav-button">
                                <a class="nav-link" href="{{ route('wiki') }}" aria-selected="false">Wiki</a>
                            </li>
                            <li class="btn btn-primary btn-sm nav-button">
                                <a class="nav-link" href="{{ route('grading') }}" aria-selected="false">Grading</a>
                            </li>

                            @guest
                                @if (Route::has('login'))
                                    <li class="btn btn-primary btn-sm nav-button">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="btn btn-primary btn-sm nav-button">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif

                                @else
                                <li class="btn btn-primary btn-sm nav-button dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" style="margin: 0.5rem 0 0;" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('profile') }}">Edit Profile</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest

                        </ul>
                    </div>
                </nav>
            </header>
            <main role="main" class="container">
                @yield("content")
            </main>
            <footer class="footer">
                By Insa Belter, Neelis Rüter and Noah Wagner
            </footer>
        </div>
    </body>
</html>
