@extends('layout')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Hotels</h2>
        <a href="{{ route('hotels.create') }}" class="btn btn-primary">Add Hotel</a>
    </div>

    @include('partials.alerts')

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Hotel Name</th>
            <th>Address</th>
            <th>Created</th>
            <th width="180">Actions</th>
        </tr>
        </thead>

        <tbody>
        @forelse ($hotels as $hotel)
            <tr>
                <td>{{ $hotel->id }}</td>
                <td>{{ $hotel->name }}</td>
                <td>{{ $hotel->address }}</td>
                <td>{{ $hotel->created_at->format('Y-m-d') }}</td>

                <td class="d-flex gap-2">
                    <a href="{{ route('hotels.show', $hotel->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST"
                          onsubmit="return confirm('Delete this hotel?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center">No hotels found.</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $hotels->links() }}

@endsection
