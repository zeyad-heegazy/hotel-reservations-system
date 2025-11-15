@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Guests</h2>
        <a href="{{ route('guests.create') }}" class="btn btn-primary">+ Add Guest</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($guests as $guest)
            <tr>
                <td>{{ $guest->id }}</td>
                <td>{{ $guest->name }}</td>
                <td>{{ $guest->email }}</td>
                <td>{{ $guest->phone }}</td>

                <td class="d-flex gap-2">
                    <a href="{{ route('guests.show', $guest->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('guests.edit', $guest->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('guests.destroy', $guest->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this guest?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $guests->links() }}
    </div>
@endsection
