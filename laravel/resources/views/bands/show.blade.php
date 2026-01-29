@extends('layouts.app')

@section('title', $band->name)

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">

            <div class="card mb-4">
                <div class="card-body text-center">

                    <h2 class="card-title mb-3">
                        {{ $band->name }}
                    </h2>

                    @if ($band->image)
                        <img src="{{ $band->image_url }}" alt="{{ $band->name }}" class="img-fluid rounded mb-3"
                            style="max-width: 250px;">
                    @endif

                    <p class="mb-2">
                        <strong>Genre:</strong> {{ $band->genre }} <br>
                        <strong>Formed:</strong> {{ $band->formed_year }}
                    </p>

                    @if ($band->description)
                        <div class="mt-3">
                            <p class="text-muted">
                                {{ $band->description }}
                            </p>
                        </div>
                    @endif

                    @auth
                        <div class="mt-3">

                            <a href="{{ route('bands.edit', $band) }}" class="btn btn-warning">
                                Editar
                            </a>

                            @if (auth()->user()->isAdmin())
                                <form method="POST" action="{{ route('bands.destroy', $band) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        Apagar
                                    </button>
                                </form>
                            @endif

                        </div>
                    @endauth

                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Álbuns do Artista</h4>

                @auth
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('albums.create', ['band_id' => $band->id]) }}" class="btn btn-success">
                            Novo álbum
                        </a>
                    @endif
                @endauth
            </div>

            @if ($albums->count())
                <div class="row g-4">
                    @foreach ($albums as $album)
                        <div class="col-12 col-sm-6 col-md-4">

                            <div class="card h-100">

                                @if ($album->image)
                                    <img src="{{ $album->image_url }}" alt="{{ $album->name }}" class="card-img-top"
                                        style="height:220px; object-fit:cover;">
                                @endif

                                <div class="card-body text-center">

                                    <h5 class="card-title">
                                        {{ $album->name }}
                                    </h5>

                                    @if ($album->release_date)
                                        <p class="mb-1 fw-semibold">
                                            Data de lançamento
                                        </p>
                                        <p class="text-muted mb-2">
                                            <small>
                                                {{ \Carbon\Carbon::parse($album->release_date)->format('d-m-Y') }}
                                            </small>
                                        </p>
                                    @endif

                                    @auth
                                        <div class="mt-2">

                                            <a href="{{ route('albums.edit', $album) }}" class="btn btn-warning btn-sm">
                                                Editar
                                            </a>

                                            @if (auth()->user()->isAdmin())
                                                <form method="POST" action="{{ route('albums.destroy', $album) }}"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">
                                                        Apagar
                                                    </button>
                                                </form>
                                            @endif

                                        </div>
                                    @endauth

                                </div>

                            </div>

                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted">
                    Este artista não tem álbuns.
                </p>
            @endif

            <div class="mt-4">
                <a href="{{ route('home') }}" class="btn btn-secondary">
                    Voltar
                </a>
            </div>

        </div>
    </div>

@endsection
