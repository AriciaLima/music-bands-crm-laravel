@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="mb-4">Dashboard</h1>

        {{-- Cards --}}
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-center h-100">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5>Total de Artistas</h5>
                        <h2>{{ $totalBands }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center h-100">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5>Total de Álbuns</h5>
                        <h2>{{ $totalAlbums }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center h-100">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5>Artistas sem Álbuns</h5>
                        <h2>{{ $bandsWithoutAlbums }}</h2>
                    </div>
                </div>
            </div>
        </div>

        {{-- Ações rápidas --}}
        <div class="mb-4">
            <a href="{{ route('bands.create') }}" class="btn btn-primary">Criar Artista</a>
            <a href="{{ route('albums.create') }}" class="btn btn-secondary">Criar Álbum</a>
            <a href="{{ route('bands.index') }}" class="btn btn-outline-dark">Ver Artistas</a>
        </div>

        {{-- Lista de artistas --}}
        <div class="card mb-4">
            <div class="card-header">
                Artistas
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Foto</th>
                            <th>Nº de Álbuns</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bands as $band)
                            <tr>
                                <td>{{ $band->name }}</td>
                                <td>
                                    @if ($band->image)
                                        <img src="{{ \Illuminate\Support\Facades\URL::to($band->image) }}" width="60"
                                            height="60" style="object-fit: cover" class="rounded">
                                    @else
                                        Sem imagem
                                    @endif
                                </td>
                                <td>{{ $band->albums_count }}</td>
                                <td>
                                    <a href="{{ route('bands.show', $band->id) }}" class="btn btn-sm btn-info">
                                        Ver
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Últimos álbuns --}}
        <div class="card">
            <div class="card-header">
                Últimos Álbuns Criados
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($latestAlbums as $album)
                        <li class="list-group-item">
                            <strong>{{ $album->name }}</strong>
                            <br>
                            Artista: {{ $album->band->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection
