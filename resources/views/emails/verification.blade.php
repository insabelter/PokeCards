<html>
    <head>
        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <title>Pok&eacute;Cards Verification</title>

        <script src="{{asset('js/app.js')}}" defer></script>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/theme.css')}}">
    </head>
    <body>
        <div style="background-color: var(--primary-light)">
            <img src="https://fontmeme.com/permalink/210514/7380c713c6ccc27634273d42b7c170f1.png" alt="pokemon-schriftart" border="0" height="60"> <br>
            <h1>Please Verify your E-Mail-Adress!</h1>
            <a href="{{ $url }}" class="btn btn-primary">Verify</a>
        </div>
    </body>
</html>


