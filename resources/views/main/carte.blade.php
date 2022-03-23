@extends('layouts.app')

@section('title', 'La carte')

@section('content')

<main>
    <section class="bloc_carte">
        <div class="titre_carte">
            <h1>La carte</h1>
        </div>

        @foreach ($plats as $plat)
            <div class="plat">
                <h2>{{ $plat->nom }}</h2>
                <p>{{ $plat->description}}</p>
                <h3>{{ $plat->prix }}</h3>
            </div>
        @endforeach


    </section>
</main>
@endsection