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
                </nav>
            </header>
            <main role="main" class="container">
                @yield("content")
            </main>
            <footer class="footer">
                <a href="{{ route('about') }}" style="margin-right: 30px;">{{ __('About') }}</a>
                <a href="{{ route('privacy') }}">{{ __('Privacy') }}</a>
                <span class="d-none d-sm-inline" style="position: fixed; right: 15px;">By Insa Belter, Neelis Rüter and Noah Wagner</span>
            </footer>
        </div>
    </body>
</html>
