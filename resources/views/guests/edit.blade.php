@extends('layout')

@section('content')
    <h2>Edit Guest #{{ $guest->id }}</h2>

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

    <form action="{{ route('guests.update', $guest->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name', $guest->name) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Email (Optional)</label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email', $guest->email) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control"
                   value="{{ old('phone', $guest->phone) }}">
        </div>

        <button class="btn btn-success">Update Guest</button>
        <a href="{{ route('guests.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
