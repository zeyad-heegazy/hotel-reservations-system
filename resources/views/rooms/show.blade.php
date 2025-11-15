@extends('layout')

@section('content')
    <h2>Room Details</h2>

    <div class="card mt-4">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $room->id }}</p>
            <p><strong>Hotel:</strong> {{ $room->hotel->name }}</p>
            <p><strong>Number:</strong> {{ $room->number }}</p>
            <p><strong>Type:</strong> {{ ucfirst($room->type) }}</p>
            <p><strong>Price per night:</strong> ${{ number_format($room->price_per_night, 2) }}</p>

            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
