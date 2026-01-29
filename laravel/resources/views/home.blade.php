@extends('layouts.app')

@section('title', 'Artistas')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Artistas</h2>

                @auth
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('bands.create') }}" class="btn btn-success">
                            Novo artista
                        </a>
                    @endif
                @endauth
            </div>

            @if ($bands->count())
                <div class="row g-4">
                    @foreach ($bands as $band)
                        <div class="col-12 col-sm-6 col-md-4">

                            <div class="card h-100 text-center">

                                @if ($band->image)
                                    <img src="{{ $band->image_url }}" alt="{{ $band->name }}" class="card-img-top"
                                        style="height:220px; object-fit:cover;">
                                @endif

                                <div class="card-body">

                                    <h5 class="card-title">
                                        {{ $band->name }}
                                    </h5>

                                    <p class="text-muted mb-2">
                                        Álbuns: {{ $band->albums_count }}
                                    </p>

                                    <a href="{{ route('bands.show', $band) }}" class="btn btn-primary btn-sm">
                                        Ver detalhes
                                    </a>

                                </div>

                            </div>

                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted">
                    Não existem artistas registados.
                </p>
            @endif

        </div>
    </div>

@endsection
