<h1>Music Bands</h1>

<a href="/login">Login</a>
<a href="/register">Register</a>

<hr>

<ul>
    @foreach ($bands as $band)
        <li>
            <p>{{ $band->name }}</p>

            @if ($band->image)
                <img src="{{ $band->image }}" alt="{{ $band->name }}" width="150">
            @endif
        </li>
    @endforeach
</ul>
