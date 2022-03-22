<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O'Buro - @yield('title')</title>
    <link rel="icon" type="image/png" href="/img/favicon.png">

    @section('style')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @show

    @section('script')
        <script src="{{ asset('js/app.js') }}" defer></script>
    @show
</head>

<body>

    <header>
        <div class="logo">
            <a href="{{ route('main.index') }}">
                <img src="{{asset('img/logo.svg')}}" alt="logo">
            </a>           
        </div>

        <nav>
            <ul class="menu">
                <li><a href="{{ route('main.carte') }}">La carte</a></li>
                <li><a href="{{ route('reservation.create') }}">Réserver</a></li>
                <li><a href="{{ route('main.contact') }}">Contact</a></li>
            </ul>
        </nav>
    </header>

    @section('content')
    @show

    <footer class="footer">

        <div><img src="{{ asset('img/localisation_fin.png') }}"></div>

        <div class="contact"><a target="blank" href="https://goo.gl/maps/yZMqgFJKvVKDXUbU9">
            Complexe Mamasita<br>
            8 route des Pavés<br>
            Face Cité Universitaire, Yaoundé</a></div>

        <div><img src="{{ asset('img/phone_fin.png') }}"></div>

        <div class="contact">
            <a href="tel:+237653988066">(+237) 653 988 066</a>
        </div>

        <div class="reseaux">
            <div class="fb"><a target="blank" href="https://www.facebook.com/mamasita.club"></a></div>
            <div class="insta"><a target="blank" href="https://www.instagram.com/?hl=fr"></a></div>
        </div>

        <div class="copyright">
            <p>copyright 2022 &copy; jonathan.cayrol<br>
                crédits photos : Ella Olsson, Viktoria Slowikowska,<br>
                Rene Asmussen (Pexels).</p>
        </div>

    </footer>
</body>
</html>