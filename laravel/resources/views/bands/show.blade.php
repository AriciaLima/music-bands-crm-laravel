<h1>{{ $band->name }}</h1>

@if ($band->image)
    <img src="{{ $band->image }}" alt="{{ $band->name }}" width="250">
@endif

<p>
    <strong>Genre:</strong> {{ $band->genre }} <br>
    <strong>Formed:</strong> {{ $band->formed_year }}
</p>

<hr>

<h2>Albums</h2>

@if ($albums->count())
    <ul>
        @foreach ($albums as $album)
            <li>
                {{ $album->name }}
                @if ($album->release_date)
                    ({{ $album->release_date }})
                @endif
            </li>
        @endforeach
    </ul>
@else
    <p>This band has no albums.</p>
@endif

<a href="/">← Back to home</a>
