@extends('layouts.adminapp')

@section('title', 'Admin - Création de réservation')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Admin - Création d'une réservation</h1>

            {{-- code utile pour déboguer un formulaire et une validation
                qui ne fonctionnent pas correctement
            --}}
            
            {{--
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
            --}}


            <form action="{{ route('admin.reservation.store') }}" method="post">
                @include('admin.reservation._form')
            </form>
        </div>
    </div>
</div>

@endsection