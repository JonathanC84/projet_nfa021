@extends('layouts.adminapp')

@section('title', 'Admin - 404 Non trouvé')

@section('content')
<div style="text-align:center">
<h1>404 - Non trouvé</h1>
@if ($message)
<p>{{ $message }}</p>
@endif
</div>
@endsection