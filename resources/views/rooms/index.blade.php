@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Rooms</h2>
        <a href="{{ route('rooms.create') }}" class="btn btn-primary">+ Add Room</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Hotel</th>
            <th>Number</th>
            <th>Type</th>
            <th>Price / night</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach($rooms as $room)
            <tr>
                <td>{{ $room->id }}</td>
                <td>{{ $room->hotel->name }}</td>
                <td>{{ $room->number }}</td>
                <td>{{ ucfirst($room->type) }}</td>
                <td>${{ number_format($room->price_per_night, 2) }}</td>

                <td class="d-flex gap-2">
                    <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $rooms->links() }}
    </div>
@endsection
