@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Reservations</h2>
        <a href="{{ route('reservations.create') }}" class="btn btn-primary">+ New Reservation</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Guest</th>
            <th>Room</th>
            <th>Type</th>
            <th>Check-In</th>
            <th>Check-Out</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($reservations as $res)
            <tr>
                <td>{{ $res->id }}</td>
                <td>{{ $res->guest->name }}</td>
                <td>Room #{{ $res->room->number }}</td>
                <td>{{ ucfirst($res->room->type) }}</td>
                <td>{{ $res->check_in }}</td>
                <td>{{ $res->check_out }}</td>

                <td>
                <span class="badge
                    @if($res->status === 'confirmed') bg-success
                    @elseif($res->status === 'cancelled') bg-danger
                    @else bg-secondary @endif">
                    {{ ucfirst($res->status) }}
                </span>
                </td>

                <td class="d-flex gap-2">
                    <a href="{{ route('reservations.show', $res->id) }}" class="btn btn-info btn-sm">View</a>

                    @if($res->status !== 'cancelled')
                        <form action="{{ route('reservations.cancel', $res->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to cancel this reservation?');">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-warning btn-sm">Cancel</button>
                        </form>
                    @endif

                    <form action="{{ route('reservations.destroy', $res->id) }}" method="POST"
                          onsubmit="return confirm('Delete this reservation permanently?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $reservations->links() }}
    </div>
@endsection
