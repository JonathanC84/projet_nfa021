<!DOCTYPE html>
<html class="background-fade-in" lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>O'Buro - @yield('title')</title>
    <link rel="icon" type="image/png" href="/img/favicon.png">

    @section('style')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @show

    @section('script')
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://kit.fontawesome.com/5e669a5a28.js" crossorigin="anonymous"></script>
    @show
</head>

<body class="fade-in">

    <header>
        <nav>
            <div class="burger-icon">
                <a onclick="openBurger()"><i class="fa-solid fa-bars fa-2x"></i></a>
            </div>

            <div id="burger-menu" class="burger-menu">
                <div class="close-menu">
                    <a href="javascript:void(0)" onclick="closeBurger()"><i class="fa-solid fa-xmark fa-3x"></i></a>
                </div>

                <div class="menu-overlay">
                    <a href="{{ route('main.carte') }}">La carte</a>
                    <a href="{{ route('reservation.create') }}">Réserver</a>
                    <a href="{{ route('main.contact') }}">Contact</a>
                </div>
            </div>

            <div class="logo">
                <a href="{{ route('main.index') }}">
                    <img src="{{asset('img/logo.svg')}}" alt="logo">
                </a>           
            </div>

            <ul class="menu">
                <li><a href="{{ route('main.carte') }}">La carte</a></li>
                <li><a href="{{ route('reservation.create') }}">Réserver</a></li>
                <li><a href="{{ route('main.contact') }}">Contact</a></li>
            </ul>
        </nav>
    </header>

    @section('content')
    @show

    <footer>

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
            <a target="blank" href="https://www.facebook.com/mamasita.club"><i class="fa-brands fa-facebook-square fa-3x"></i></a>
            <a target="blank" href="https://www.instagram.com/?hl=fr"><i class="fa-brands fa-instagram fa-3x"></i></a>
        </div>

        <div class="copyright">
            <p>copyright 2022 &copy; jonathan.cayrol<br>
                crédits photos : Ella Olsson, Viktoria Slowikowska,<br>
                Rene Asmussen (Pexels).</p>
        </div>

    </footer>
</body>
</html>