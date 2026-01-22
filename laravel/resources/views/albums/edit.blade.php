@extends('layouts.app')

@section('title', 'Editar Álbum')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">

            <div class="card">
                <div class="card-header">
                    <h4>Editar álbum</h4>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('albums.update', $album) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome do álbum</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name', $album->name) }}" required>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="release_date" class="form-label">Data de lançamento</label>
                            <input type="date" name="release_date" id="release_date" class="form-control"
                                value="{{ old('release_date', $album->release_date) }}">
                            @error('release_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Imagem do álbum</label>
                            <input type="text" name="image" id="image" class="form-control"
                                value="{{ old('image', $album->image) }}">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        @if ($album->image)
                            <div class="mb-3 text-center">
                                <img src="{{ $album->image }}" alt="{{ $album->name }}" class="img-fluid rounded"
                                    style="max-width: 200px;">
                            </div>
                        @endif

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('bands.show', $album->band_id) }}" class="btn btn-secondary">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Guardar alterações
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection
