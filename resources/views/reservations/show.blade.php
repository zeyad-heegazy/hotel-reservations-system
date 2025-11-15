@extends('layout')

@section('content')
    <h2>Reservation Details</h2>

    <div class="card mt-4">
        <div class="card-body">

            <p><strong>ID:</strong> {{ $reservation->id }}</p>

            <p><strong>Guest:</strong>
                <a href="{{ route('guests.show', $reservation->guest->id) }}">
                    {{ $reservation->guest->name }}
                </a>
            </p>

            <p><strong>Room:</strong>
                Room #{{ $reservation->room->number }} ({{ ucfirst($reservation->room->type) }})
            </p>

            <p><strong>Check-In:</strong> {{ $reservation->check_in }}</p>
            <p><strong>Check-Out:</strong> {{ $reservation->check_out }}</p>

            <p><strong>Status:</strong>
                <span class="badge
                @if($reservation->status === 'confirmed') bg-success
                @elseif($reservation->status === 'cancelled') bg-danger
                @else bg-secondary @endif">
                {{ ucfirst($reservation->status) }}
            </span>
            </p>

            <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Back</a>

            @if($reservation->status !== 'cancelled')
                <form action="{{ route('reservations.cancel', $reservation->id) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Are you sure you want to cancel this reservation?');">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-warning">Cancel Reservation</button>
                </form>
            @endif

            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('Delete this reservation permanently?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>

        </div>
    </div>
@endsection
