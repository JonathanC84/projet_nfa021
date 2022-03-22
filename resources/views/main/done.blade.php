@extends('layouts.app')

@section('title', 'Réservation')

@section('content')

    @if($reservation)
    <div class="blocReservation">
        <h1>Votre réservation</h1>
        <div class="recap">
        <p>
            Nom : {{ $reservation->nom }}
        </p>

        <p>
           Téléphone : {{ $reservation->tel }}
        </p>

        <p>
            Date : {{ $reservation->date }}
        </p>

        <p>
            Heure : {{ $reservation->heure }}
        </p>

        <p>
           Nombre de couverts : {{ $reservation->couverts }}
        </p>
        </div>
        <a href="{{ route('main.index') }}" class="confirmer">Valider</a>
        <a href="{{ route('reservation.edit', ['id' => $reservation->id]) }}" class="modifier">Modifier</a>
        <form action="{{ route('reservation.destroy', ['id' => $reservation->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="supprimer">Annuler</button>
        </form>    </div>
    @endif

@endsection