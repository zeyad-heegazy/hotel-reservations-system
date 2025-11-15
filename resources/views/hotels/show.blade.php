@extends('layout')

@section('content')

    <h2 class="mb-3">{{ $hotel->name }}</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Address:</strong> {{ $hotel->address }}</p>
            <p><strong>Created:</strong> {{ $hotel->created_at->format('Y-m-d H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('hotels.index') }}" class="btn btn-secondary mt-3">Back</a>

@endsection
