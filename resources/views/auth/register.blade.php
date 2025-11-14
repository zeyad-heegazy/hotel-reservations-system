@extends('layout')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-4">
            <h3 class="mb-3">Register</h3>

            <form method="POST">
                @csrf

                <div class="mb-3">
                    <label>Name</label>
                    <input class="form-control" name="name">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input class="form-control" name="email">
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password">
                </div>

                <button class="btn btn-success w-100">Register</button>
            </form>

            <p class="mt-3">Already registered? <a href="/login">Login</a></p>
        </div>
    </div>

@endsection
