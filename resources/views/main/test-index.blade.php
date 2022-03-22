<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }} ">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>O'Buro</title>
</head>
<body>
    <header>
        <div class=logo>
            <a href="/"><img alt="logo" src="{{ asset('img/logo_simple.png') }}" height=91 width=144 ></a>
        </div>
        <nav>
            <ul>
                <li><a href="/carte">la carte</a></li>
                <li><a href="/reservation">réservez</a></li>
                <li><a href="/contact">contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        {{ $message }}
    </main>
</body>
</html>