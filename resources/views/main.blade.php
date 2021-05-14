<!DOCTYPE html>
<html>
    <head>
        <title>Pok&eacute;Cards @yield('title')</title>
    </head>
    <body>
        <h1>Pok&eacute;Cards</h1>
        <a href="{{ route('main') }}"><button>Main</button></a>
        <a href="{{ route('trading') }}"><button>Trading</button></a>
        <a href="{{ route('wiki') }}"><button>Wiki</button></a>
        <a href="{{ route('grading') }}"><button>Grading</button></a>
        <a href="{{ route('profile') }}"><button>Profile</button></a>
        <br>
        @yield('content')
    </body>
</html>
