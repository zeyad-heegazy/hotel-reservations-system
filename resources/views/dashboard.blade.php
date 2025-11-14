@extends('layout')

@section('content')

    <h2>Dashboard</h2>

    <div class="list-group mt-4">
        <a href="/hotels" class="list-group-item list-group-item-action">Manage Hotels</a>
        <a href="/rooms" class="list-group-item list-group-item-action">Manage Rooms</a>
        <a href="/guests" class="list-group-item list-group-item-action">Manage Guests</a>
        <a href="/reservations" class="list-group-item list-group-item-action">Manage Reservations</a>
    </div>

@endsection
