@extends('layouts.adminapp')

@section('title', 'Admin - Modification de réservation')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Admin - Modification de la réservation</h1>

            {{-- code utile pour déboguer un formulaire et une validation
                qui ne fonctionnent pas correctement
            --}}
            
            {{--
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
            --}}


            <form action="{{ route('admin.reservation.update', ['id' => $reservation->id]) }}" method="post">
                @method('PUT')
                <div>
                    <input type="text" class="form-control" value="{{ $reservation->id }}" readonly>
                </div>
                @include('admin.reservation._form')
            </form>
        </div>
    </div>
</div>

@endsection