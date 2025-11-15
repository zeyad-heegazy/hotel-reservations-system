@extends('layout')

@section('content')

    <h2 class="mb-4">Edit Hotel</h2>

    @include('partials.alerts')

    <form method="POST" action="{{ route('hotels.update', $hotel->id) }}">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label class="form-label">Hotel Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $hotel->name) }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $hotel->address) }}">
            @error('address') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-warning">Update</button>
        <a href="{{ route('hotels.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

@endsection
