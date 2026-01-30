@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">

        <!-- Page Header -->
        <div class="mb-4">
            <h2 class="mb-1">
                <i class="bi bi-speedometer2"></i> Dashboard
            </h2>
            <p class="text-muted">Bem-vindo ao painel de administração</p>
        </div>

        <!-- Stats Cards -->
        <div class="row mb-4 g-3">
            <div class="col-md-4">
                <div class="card stat-card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <i class="bi bi-music-note-beamed"></i> Total de Artistas
                        </h5>
                        <h2 class="mb-0">{{ $totalBands }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card stat-card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <i class="bi bi-disc"></i> Total de Álbuns
                        </h5>
                        <h2 class="mb-0">{{ $totalAlbums }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card stat-card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <i class="bi bi-exclamation-circle"></i> Artistas sem Álbuns
                        </h5>
                        <h2 class="mb-0 text-warning">{{ $bandsWithoutAlbums }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="mb-0">
                        <i class="bi bi-lightning-charge"></i> Ações Rápidas
                    </h5>
                </div>
                <div class="card-body">
                    <div class="gap-2 d-flex flex-wrap">
                        <a href="{{ route('bands.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Criar Artista
                        </a>
                        <a href="{{ route('albums.create') }}" class="btn btn-info">
                            <i class="bi bi-plus-circle"></i> Criar Álbum
                        </a>
                        <a href="{{ route('bands.index') }}" class="btn btn-outline-dark">
                            <i class="bi bi-list"></i> Ver Artistas
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bands List -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">
                    <i class="bi bi-list-ul"></i> Artistas
                </h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Género</th>
                                <th scope="col">Formação</th>
                                <th scope="col">Álbuns</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bands as $band)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            @if ($band->image)
                                                <img src="{{ $band->image_url }}" alt="{{ $band->name }}"
                                                    style="width: 40px; height: 40px; object-fit: cover; border-radius: 0.25rem;">
                                            @else
                                                <div class="bg-light rounded p-2" style="width: 40px; height: 40px;">
                                                    <i class="bi bi-image text-muted"></i>
                                                </div>
                                            @endif
                                            <strong>{{ $band->name }}</strong>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-secondary">{{ $band->genre }}</span></td>
                                    <td>{{ $band->formed_year }}</td>
                                    <td>
                                        <span class="badge bg-info">{{ $band->albums_count }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('bands.show', $band->id) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        <i class="bi bi-inbox"></i> Nenhuma banda registada
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Latest Albums -->
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0">
                    <i class="bi bi-clock-history"></i> Últimos Álbuns Criados
                </h5>
            </div>
            <div class="card-body">
                @if ($latestAlbums->count())
                    <div class="list-group">
                        @foreach ($latestAlbums as $album)
                            <a href="{{ route('albums.edit', $album) }}" class="list-group-item list-group-item-action">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1">
                                            <i class="bi bi-disc"></i> {{ $album->name }}
                                        </h6>
                                        <p class="mb-0 text-muted small">
                                            Artista: <strong>{{ $album->band->name }}</strong>
                                        </p>
                                    </div>
                                    <small class="text-muted">
                                        {{ $album->created_at->format('d/m/Y') }}
                                    </small>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted text-center py-4">
                        <i class="bi bi-inbox"></i> Nenhum álbum criado
                    </p>
                @endif
            </div>
        </div>

    </div>
@endsection
