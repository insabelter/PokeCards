<!DOCTYPE html>
<html>
    <head>
        <title>Pok&eacute;Cards @yield('title')</title>
    </head>
    <body>
        <h1><img src="https://fontmeme.com/permalink/210514/7380c713c6ccc27634273d42b7c170f1.png" alt="pokemon-schriftart" border="0"></h1>
        <a href="{{ route('main') }}"><button>Main</button></a>
        <a href="{{ route('trading') }}"><button>Trading</button></a>
        <a href="{{ route('wiki') }}"><button>Wiki</button></a>
        <a href="{{ route('grading') }}"><button>Grading</button></a>
        <a href="{{ route('profile') }}"><button>Profile</button></a>
        <br>
        @yield('content')
    </body>
</html>
