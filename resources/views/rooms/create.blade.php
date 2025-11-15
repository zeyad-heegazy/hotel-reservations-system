@extends('layout')

@section('content')
    <h2>Add New Room</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Fix the errors below:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rooms.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-3">
            <label class="form-label">Hotel</label>
            <select name="hotel_id" class="form-control">
                @foreach($hotels as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Room Number</label>
            <input type="text" name="number" class="form-control" value="{{ old('number') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Room Type</label>
            <select name="type" class="form-control">
                @foreach(\App\Enums\RoomTypeEnum::cases() as $type)
                    <option value="{{ $type->value }}">{{ ucfirst($type->value) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Price Per Night</label>
            <input type="number" step="0.01" name="price_per_night" class="form-control" value="{{ old('price_per_night') }}">
        </div>

        <button class="btn btn-primary">Create Room</button>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
