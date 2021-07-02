<!DOCTYPE html>
<html>
    <head>
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-813PWM0KEY"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-813PWM0KEY');
        </script>
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
                                    @if(Auth::id() !== null)
                                        <a class="dropdown-item" href="{{ route('watchlist') }}">Watchlist</a>
                                        <a class="dropdown-item" href="{{ route('offers', 'x') }}">Your Offers</a>
                                    @endif
                                </div>
                            </li>
                            <li class="btn btn-primary btn-sm nav-button dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Wiki
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" style="margin: 0.5rem 0 0;" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('card-search') }}">Card Search</a>
                                    <a class="dropdown-item" href="{{ route('set-explorer-sets', 'x') }}">Set Explorer</a>
                                </div>
                            </li>
                            <li class="btn btn-primary btn-sm nav-button dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Grading
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" style="margin: 0.5rem 0 0;" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('guide') }}">Guide</a>
                                    <a class="dropdown-item" href="{{ route('psa') }}">PSA Calculator</a>
                                    <a class="dropdown-item" href="{{ route('egs') }}">EGS Calculator</a>
                                </div>
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
                                        @if(\Illuminate\Support\Facades\Auth::user()->is_admin == true)
                                            <a class="dropdown-item" href="{{ route('admin') }}">Admin</a>
                                        @endif
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
                <a href="{{ route('about') }}" style="margin-right: 30px;">{{ __('About') }}</a>
                <a href="{{ route('privacy') }}" style="margin-right: 30px;">{{ __('Privacy') }}</a>
                <a href="{{ route('contact') }}">{{ __('Contact') }}</a>
                <span class="d-none d-sm-inline" style="position: fixed; right: 15px;">By Insa Belter, Neelis Rüter and Noah Wagner</span>
            </footer>
        </div>
    </body>
</html>
