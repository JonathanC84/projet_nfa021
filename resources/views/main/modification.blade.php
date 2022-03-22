@extends('layouts.app')

@section('title', 'Réservation')

@section('content')

    <main>
    <section class="blocReservation">
        <h1>Réservez votre table</h1>

        {{--
        @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
        --}}

        <form action="{{ route('reservation.update'), ['id' => $reservation->id] }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <input type="text" id="nom" name="nom" placeholder="Votre nom" value="{{ $reservation->nom }}">
                @error('nom')
                <div class="erreur_champ">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <input type="tel" id="tel" name="tel" placeholder="Votre numéro de téléphone" value="{{ $reservation->tel }}">
                @error('tel')
                <div class="erreur_champ">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <p>Choisissez la date et l'heure...</p>
            
                <input type="date" id="date" name="date" value="{{ $reservation->date }}">
                @error('date')
                <div class="erreur_champ">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <input type="time" id="heure" name="heure" value="{{ $reservation->heure }}">
                @error('time')
                <div class="erreur_champ">{{ $message }}</div>
                @enderror
            </div>
            
            <div>
                <p>...et le nombre de couverts</p>
            
                <input type="number" id="couverts" name="couverts" value="{{ $reservation->couverts }}" min="1" max="12" >
                @error('couverts')
                <div class="erreur_champ">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <textarea name="commentaires" id="commentaires" rows="10" placeholder="Commentaires">{{ $reservation->commentaires }}</textarea>
                @error('commentaires')
                <div class="erreur_champ">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <input type="hidden" id="confirmation" name="confirmation" value="{{ $reservation->confirmation }}">
            </div>

            <div>
                <button class="reservez" type="submit">Réserver</button>
            </div>
        </form>
    </section>
    </main>

@endsection