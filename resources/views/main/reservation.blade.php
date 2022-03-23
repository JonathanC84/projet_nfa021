@extends('layouts.app')

@section('title', 'Réservation')

@section('content')

    <main>
    <section class="blocReservation">
        <h1>Réservez votre table</h1>
        
        <div class="table_picto">
            <img src="img/table_chaises.png">
        </div>
        {{--
        @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
        --}}

        <form action="{{ route('reservation.store') }}" method="post">
            @csrf
            <div>
                <input type="text" id="nom" name="nom" placeholder="Votre nom" value="{{ old('nom', $reservation->nom) }}">
                @error('nom')
                <div class="erreur_champ">{{ $message }}</div>
                @enderror

                <input type="tel" id="tel" name="tel" placeholder="Votre numéro de téléphone" value="{{ old('tel', $reservation->tel) }}">
                @error('tel')
                <div class="erreur_champ">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <p>Choisissez la date et l'heure...</p>
            
                <input type="date" min="{{ $now->format('Y-m-d') }}" id="date" name="date" value="{{ old('date', $reservation->date) }}">
                @error('date')
                <div class="erreur_champ">{{ $message }}</div>
                @enderror

                <input type="time" id="heure" name="heure" value="{{ old('heure', $reservation->heure) }}">
                @error('time')
                <div class="erreur_champ">{{ $message }}</div>
                @enderror            </div>
            
            <div>
                <p>...et le nombre de couverts</p>
            
                <input type="number" id="couverts" name="couverts" value="{{ old('couverts', $reservation->couverts) }}" min="1" max="12" placeholder="1" >
                @error('couverts')
                <div class="erreur_champ">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <textarea name="commentaires" id="commentaires" rows="10" placeholder="Commentaires">{{ old('commentaires', $reservation->commentaires) }}</textarea>
                @error('commentaires')
                <div class="erreur_champ">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <input type="hidden" id="confirmation" name="confirmation" value="null">
            </div>

            <div>
                <button class="reservez" type="submit">Réserver</button>
            </div>
        </form>
    </section>
    </main>

@endsection