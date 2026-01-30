@extends('layouts.app')

@section('title', 'Artistas')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">

            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="mb-1">
                        <i class="bi bi-music-note-list"></i> Artistas
                    </h2>
                    <p class="text-muted mb-0">Total: {{ $bands->count() }} banda(s)</p>
                </div>

                @auth
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('bands.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Novo Artista
                        </a>
                    @endif
                @endauth
            </div>

            <!-- Bands Grid -->
            @if ($bands->count())
                <div class="row g-4">
                    @foreach ($bands as $band)
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="card band-card h-100 shadow-sm">
                                @if ($band->image)
                                    <img src="{{ $band->image_url }}" alt="{{ $band->name }}" class="card-img-top">
                                @else
                                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center"
                                        style="height: 220px;">
                                        <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                    </div>
                                @endif

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $band->name }}</h5>

                                    <p class="text-muted small mb-2">
                                        <i class="bi bi-music-note-beamed"></i> {{ $band->genre }}
                                    </p>

                                    <p class="text-muted small mb-3">
                                        <i class="bi bi-calendar-event"></i> Desde {{ $band->formed_year }}
                                    </p>

                                    <div class="alert alert-info py-2 px-3 mb-3" role="alert">
                                        <small>
                                            <i class="bi bi-disc"></i>
                                            <strong>{{ $band->albums_count }}</strong> álbum(ns)
                                        </small>
                                    </div>

                                    <div class="mt-auto">
                                        <a href="{{ route('bands.show', $band) }}" class="btn btn-primary btn-sm w-100">
                                            <i class="bi bi-arrow-right"></i> Ver Detalhes
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info text-center py-5" role="alert">
                    <i class="bi bi-info-circle" style="font-size: 2rem;"></i>
                    <p class="mt-3 mb-0">Nenhuma banda registada no sistema.</p>
                </div>
            @endif

        </div>
    </div>
@endsection
