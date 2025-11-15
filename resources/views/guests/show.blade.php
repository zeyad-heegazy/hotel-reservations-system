@extends('layout')

@section('content')
    <h2>Guest Details</h2>

    <div class="card mt-4">
        <div class="card-body">

            <p><strong>ID:</strong> {{ $guest->id }}</p>
            <p><strong>Name:</strong> {{ $guest->name }}</p>
            <p><strong>Email:</strong> {{ $guest->email ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $guest->phone }}</p>

            <a href="{{ route('guests.edit', $guest->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('guests.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>


    {{-- ========================= --}}
    {{-- Guest Reservations Section --}}
    {{-- ========================= --}}
    <h3 class="mt-5">Reservations</h3>

    @if ($guest->reservations->isEmpty())
        <p class="text-muted">This guest has no reservations yet.</p>
    @else
        <table class="table table-bordered mt-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Room</th>
                <th>Type</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th>Status</th>
                <th>View</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($guest->reservations as $res)
                <tr>
                    <td>{{ $res->id }}</td>

                    <td>
                        Room #{{ $res->room->number }}
                    </td>

                    <td>
                        {{ ucfirst($res->room->type) }}
                    </td>

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

                    <td>
                        <a href="{{ route('reservations.show', $res->id) }}" class="btn btn-info btn-sm">
                            View
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

@endsection
