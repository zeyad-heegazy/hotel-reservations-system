@extends('layout')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-4">
            <h3 class="mb-3">Login</h3>

            <form method="POST">
                @csrf

                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label>Email</label>
                    <input class="form-control" name="email">
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password">
                </div>

                <button class="btn btn-primary w-100">Login</button>
            </form>

            <p class="mt-3">No account? <a href="/register">Register</a></p>
        </div>
    </div>

@endsection
