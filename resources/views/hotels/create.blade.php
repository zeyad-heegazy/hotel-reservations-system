@extends('layout')

@section('content')

    <h2 class="mb-4">Create Hotel</h2>

    @include('partials.alerts')

    <form method="POST" action="{{ route('hotels.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Hotel Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
            @error('address') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('hotels.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

@endsection
