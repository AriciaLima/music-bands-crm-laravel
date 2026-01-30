@extends('layouts.app')

@section('title', $band->name)

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">

            <!-- Band Info Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    @if ($band->image)
                        <img src="{{ $band->image_url }}" alt="{{ $band->name }}" class="img-fluid rounded mb-4"
                            style="max-width: 300px; max-height: 300px; object-fit: cover;">
                    @else
                        <div class="bg-light rounded mb-4 d-inline-block p-5">
                            <i class="bi bi-image text-muted" style="font-size: 4rem;"></i>
                        </div>
                    @endif

                    <h2 class="card-title mb-3">{{ $band->name }}</h2>

                    <div class="row text-center mb-4">
                        <div class="col-6 col-md-3">
                            <small class="text-muted d-block">Género</small>
                            <strong>{{ $band->genre }}</strong>
                        </div>
                        <div class="col-6 col-md-3">
                            <small class="text-muted d-block">Formação</small>
                            <strong>{{ $band->formed_year }}</strong>
                        </div>
                        <div class="col-6 col-md-3">
                            <small class="text-muted d-block">Álbuns</small>
                            <strong>{{ $albums->count() }}</strong>
                        </div>
                        <div class="col-6 col-md-3">
                            <small class="text-muted d-block">Criado em</small>
                            <strong>{{ $band->created_at->format('d/m/Y') }}</strong>
                        </div>
                    </div>

                    @if ($band->description)
                        <div class="alert alert-light mb-4">
                            <p class="mb-0">{{ $band->description }}</p>
                        </div>
                    @endif

                    @auth
                        <div class="gap-2 d-flex justify-content-center">
                            <a href="{{ route('bands.edit', $band) }}" class="btn btn-warning">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>

                            @if (auth()->user()->isAdmin())
                                <form method="POST" action="{{ route('bands.destroy', $band) }}" class="d-inline"
                                    onsubmit="return confirm('Tem a certeza que deseja apagar esta banda?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Apagar
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endauth
                </div>
            </div>

            <!-- Albums Section -->
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>
                        <i class="bi bi-disc"></i> Álbuns da Banda
                    </h4>

                    @auth
                        @if (auth()->user()->isAdmin())
                            <a href="{{ route('albums.create', ['band_id' => $band->id]) }}" class="btn btn-success btn-sm">
                                <i class="bi bi-plus-circle"></i> Novo Álbum
                            </a>
                        @endif
                    @endauth
                </div>

                @if ($albums->count())
                    <div class="row g-4">
                        @foreach ($albums as $album)
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="card album-card shadow-sm h-100">
                                    @if ($album->image)
                                        <img src="{{ $album->image_url }}" alt="{{ $album->name }}" class="card-img-top">
                                    @else
                                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center"
                                            style="height: 220px;">
                                            <i class="bi bi-disc text-muted" style="font-size: 3rem;"></i>
                                        </div>
                                    @endif

                                    <div class="card-body text-center d-flex flex-column">
                                        <h6 class="card-title">{{ $album->name }}</h6>

                                        @if ($album->release_date)
                                            <p class="text-muted small mb-3">
                                                <i class="bi bi-calendar-check"></i>
                                                {{ \Carbon\Carbon::parse($album->release_date)->format('d/m/Y') }}
                                            </p>
                                        @endif

                                        <div class="mt-auto gap-2 d-flex justify-content-center">
                                            @auth
                                                <a href="{{ route('albums.edit', $album) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil"></i> Editar
                                                </a>

                                                @if (auth()->user()->isAdmin())
                                                    <form method="POST" action="{{ route('albums.destroy', $album) }}"
                                                        class="d-inline" onsubmit="return confirm('Tem a certeza?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="bi bi-trash"></i> Apagar
                                                        </button>
                                                    </form>
                                                @endif
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info" role="alert">
                        <i class="bi bi-info-circle"></i> Esta banda não tem álbuns registados.
                    </div>
                @endif
            </div>

            <!-- Back Button -->
            <div class="mt-4">
                <a href="{{ route('home') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>

        </div>
    </div>
@endsection
