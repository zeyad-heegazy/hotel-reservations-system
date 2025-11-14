@extends('layout')

@section('content')

    <h2 class="mb-4">Dashboard</h2>

    <div class="row g-4">

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="text-muted">Hotels</h5>
                    <h2>{{ $hotelsCount }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="text-muted">Rooms</h5>
                    <h2>{{ $roomsCount }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="text-muted">Guests</h5>
                    <h2>{{ $guestsCount }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="text-muted">Reservations</h5>
                    <h2>{{ $reservationsCount }}</h2>
                </div>
            </div>
        </div>

    </div>

    <hr class="my-5">

    <h4>Rooms By Type</h4>

    <div class="row mt-3">
        @foreach($roomsPerType as $item)
            <div class="col-md-4">
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body text-center">
                        <h6 class="text-secondary text-uppercase">{{ ucfirst($item->type) }}</h6>
                        <h3>{{ $item->count }}</h3>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <hr class="my-5">

    <h4>Quick Management</h4>

    <div class="list-group mt-3">
        <a href="/hotels" class="list-group-item list-group-item-action">Manage Hotels</a>
        <a href="/rooms" class="list-group-item list-group-item-action">Manage Rooms</a>
        <a href="/guests" class="list-group-item list-group-item-action">Manage Guests</a>
        <a href="/reservations" class="list-group-item list-group-item-action">Manage Reservations</a>
    </div>

@endsection
