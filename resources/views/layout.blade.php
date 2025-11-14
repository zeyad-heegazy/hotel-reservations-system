<!DOCTYPE html>
<html>
<head>
    <title>Hotel Reservation System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="/dashboard">Hotel System</a>

    @auth
        <div class="ms-auto">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>
    @endauth
</nav>

<div class="container py-4">
    @yield('content')
</div>

</body>
</html>
