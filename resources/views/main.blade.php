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
                <a href="{{ route('start') }}"><img src="https://fontmeme.com/permalink/210514/7380c713c6ccc27634273d42b7c170f1.png" alt="pokemon-schriftart" border="0" height="60"></a>
                <a href="{{ route('trading') }}"><button>Trading</button></a>
                <a href="{{ route('wiki') }}"><button>Wiki</button></a>
                <a href="{{ route('grading') }}"><button>Grading</button></a>
                <a href="{{ route('profile') }}"><button>Profile</button></a>
            </header>
            <div id="content-wrap">
                <!-- all other page content -->
                <div id="content">
                    @yield('content')
                </div>
            </div>
            <footer>
                Hallo ich bin ein Footer
            </footer>
        </div>
    </body>
</html>
