<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Music Bands')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="container py-4">

    <header class="mb-4">
        <h1 class="mb-3">Music Bands</h1>

        <div>
            @auth
                <span class="me-2">Hello, {{ auth()->user()->name }}</span>
                <form method="POST" action="/logout" class="d-inline">
                    @csrf
                    <button class="btn btn-sm btn-outline-danger">Logout</button>
                </form>
            @else
                <a href="/login" class="btn btn-outline-primary me-2">Login</a>
                <a href="/register" class="btn btn-outline-secondary">Register</a>
            @endauth
        </div>
    </header>

    <main>
        @yield('content')
    </main>

</body>

</html>
