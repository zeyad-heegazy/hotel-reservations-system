@extends('layout')

@section('content')
    <h2>Create Reservation</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the errors below:</strong>
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservations.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-3">
            <label class="form-label">Guest</label>
            <select name="guest_id" class="form-control">
                @foreach($guests as $guest)
                    <option value="{{ $guest->id }}">{{ $guest->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Room</label>
            <select name="room_id" class="form-control">
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">
                        Room #{{ $room->number }} — {{ ucfirst($room->type) }} (${!! $room->price_per_night !!}/night)
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Check-In</label>
            <input type="date" name="check_in" class="form-control" value="{{ old('check_in') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Check-Out</label>
            <input type="date" name="check_out" class="form-control" value="{{ old('check_out') }}">
        </div>

        <button class="btn btn-primary">Create Reservation</button>
        <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
