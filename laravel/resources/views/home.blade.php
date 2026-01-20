@extends('layouts.app')

@section('title', 'Music Bands')

@section('content')

    <div class="row">
        @foreach ($bands as $band)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <a href="{{ route('bands.show', $band->id) }}" class="text-decoration-none text-dark">

                    <div class="card h-100">
                        @if ($band->image)
                            <img src="{{ $band->image }}" alt="{{ $band->name }}" class="card-img-top"
                                style="height:200px; object-fit:cover;">
                        @endif

                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $band->name }}</h5>

                            <p class="card-text mb-1">
                                {{ $band->genre }}
                            </p>

                            <p class="card-text">
                                <small class="text-muted">
                                    Albums: {{ $band->albums_count }}
                                </small>
                            </p>
                        </div>
                    </div>

                </a>
            </div>
        @endforeach
    </div>

@endsection
