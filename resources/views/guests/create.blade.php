@extends('layout')

@section('content')
    <h2>Add New Guest</h2>

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

    <form action="{{ route('guests.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control"
                   value="{{ old('phone') }}">
        </div>

        <button class="btn btn-primary">Create Guest</button>
        <a href="{{ route('guests.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
