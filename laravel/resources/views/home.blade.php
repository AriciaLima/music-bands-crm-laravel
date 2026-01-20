<!DOCTYPE html>
<html>

<head>
    <title>Music Bands</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="container py-4">
    <h1>Music Bands</h1>

    <a href="/login">Login</a>
    <a href="/register">Register</a>

    <hr>
    <div class="row">
        @foreach ($bands as $band)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <a href="{{ route('bands.show', $band->id) }}" class="text-decoration-none text-dark">

                    <div class="card h-100">
                        @if ($band->image)
                            <img src="{{ $band->image }}" class="card-img-top" style="height:200px; object-fit:cover;"
                                alt="{{ $band->name }}">
                        @endif

                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $band->name }}</h5>
                            <p class="card-text">{{ $band->genre }}</p>
                        </div>
                    </div>

                </a>
            </div>
        @endforeach
    </div>
</body>

</html>
