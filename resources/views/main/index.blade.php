@extends('layouts.app')

@section('title', 'Bienvenue')

@section('content')

<main>
    <section>
        <p id="intro">Venez profiter des plats<br/>savoureux de <span id="texte_rouge">Mama Lucie</span></p>
    </section>

    <section class="carte">
        <div id="carte_photo_large"></div>
        <div id="carte_texte">
            <img src="img/la_carte.png">
            <p>
                Petit-déjeuner, déjeuner, dîner,<br>
                O’Buro vous propose de délicieux<br>
                plats à toute heure !
            </p>
            <div id="carte_photo_small"></div>
            <a id="lien_carte" href="{{ route('main.carte') }}">La carte ></a>
        </div>
    </section>

    <section class="actus">

        <div class="en_ce_moment">
            <img src="img/table_chaises.png">
            <h1>En ce moment</h1>
            <div class="photos_actus">
                <div id="actu_01">
                    <h2 class="titre_actu">Découvrez notre<br>nouvelle salle</h2>
                </div>
                <div id="actu_02">
                    <h2 class="titre_actu">Pour un plat acheté,<br>une salade de fruits offerte</h2>
                </div>
            </div>
            <a class="lien_reservez" href="{{ route('reservation.create') }}">Réservez</a>

        </div>

    </section>

</main>

@endsection