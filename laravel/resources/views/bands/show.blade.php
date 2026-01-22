@extends('layouts.app')

@section('title', $band->name)

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">

            {{-- Band info --}}
            <div class="card mb-4">
                <div class="card-body text-center">

                    <h2 class="card-title mb-3">
                        {{ $band->name }}
                    </h2>

                    @if ($band->image)
                        <img src="{{ $band->image }}" alt="{{ $band->name }}" class="img-fluid rounded mb-3"
                            style="max-width: 250px;">
                    @endif

                    <p class="mb-0">
                        <strong>Genre:</strong> {{ $band->genre }} <br>
                        <strong>Formed:</strong> {{ $band->formed_year }}
                    </p>

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

            {{-- Albums --}}
            <h4 class="mb-4">Álbuns</h4>

            @if ($albums->count())
                <div class="row g-4">
                    @foreach ($albums as $album)
                        <div class="col-12 col-sm-6 col-md-4">

                            <div class="card h-100">

                                @if ($album->image)
                                    <img src="{{ $album->image }}" alt="{{ $album->name }}" class="card-img-top"
                                        style="height:220px; object-fit:cover;">
                                @endif

                                <div class="card-body text-center">
                                    <h5 class="card-title">
                                        {{ $album->name }}
                                    </h5>

                                    @if ($album->release_date)
                                        <p class="text-muted mb-0">
                                            <small>
                                                Data de lançamento: {{ $album->release_date }}
                                            </small>
                                        </p>
                                    @endif
                                </div>

                            </div>

                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted">
                    Esta banda não tem álbuns.
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
