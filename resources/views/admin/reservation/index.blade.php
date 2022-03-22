@extends('layouts.adminapp')

@section('title', 'Admin - Liste des réservations')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @if ($reservations)
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th>nom</th>
                        <th>tel</th>
                        <th>date</th>
                        <th>heure</th>
                        <th>couverts</th>
                        <th>commentaires</th>
                        <th>confirmation</th>
                        <th>action</th>
                    </tr>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->nom }}</td>
                        <td>{{ $reservation->tel }}</td>
                        <td>{{ $reservation->date }}</td>
                        <td>{{ $reservation->heure }}</td>
                        <td>{{ $reservation->couverts }}</td>
                        <td>{{ $reservation->commentaires }}</td>
                        <td>
                            @if ($reservation->confirmation === 0)
                                Annulée
                            @elseif ($reservation->confirmation === 1)
                                Confirmée
                            @else
                                En attente
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.reservation.edit', ['id' => $reservation->id]) }}" class="btn btn-warning">modifier</a>
                            <form action="{{ route('admin.reservation.destroy', ['id' => $reservation->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                @endif
        </div>
    </div>
</div>
@endsection