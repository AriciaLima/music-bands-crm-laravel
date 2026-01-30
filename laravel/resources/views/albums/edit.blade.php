@extends('layouts.app')

@section('title', 'Editar Álbum')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">

            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">
                        <i class="bi bi-pencil-square"></i> Editar Álbum: {{ $album->name }}
                    </h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('albums.update', $album) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Artista -->
                        <div class="mb-3">
                            <label for="band_id" class="form-label">
                                <i class="bi bi-music-note-beamed"></i> Artista
                            </label>
                            <select name="band_id" id="band_id" class="form-select @error('band_id') is-invalid @enderror"
                                required>
                                <option value="">-- Selecione um Artista --</option>
                                @foreach ($bands as $band)
                                    <option value="{{ $band->id }}"
                                        {{ old('band_id', $album->band_id) == $band->id ? 'selected' : '' }}>
                                        {{ $band->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('band_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nome -->
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="bi bi-disc"></i> Nome do Álbum
                            </label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $album->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Data de Lançamento -->
                        <div class="mb-3">
                            <label for="release_date" class="form-label">
                                <i class="bi bi-calendar-check"></i> Data de Lançamento
                            </label>
                            <input type="date" name="release_date" id="release_date"
                                class="form-control @error('release_date') is-invalid @enderror"
                                value="{{ old('release_date', $album->release_date) }}">
                            @error('release_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Imagem por URL -->
                        <div class="mb-3">
                            <label for="image" class="form-label">
                                <i class="bi bi-image"></i> Imagem (URL)
                            </label>
                            <input type="url" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror"
                                value="{{ old('image', $album->image) }}">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Separator -->
                        <div class="text-center my-3">
                            <span class="badge bg-secondary">OU</span>
                        </div>

                        <!-- Upload de Imagem -->
                        <div class="mb-3">
                            <label for="image_file" class="form-label">
                                <i class="bi bi-upload"></i> Alterar Imagem
                            </label>
                            <input type="file" name="image_file" id="image_file"
                                class="form-control @error('image_file') is-invalid @enderror" accept="image/*">
                            <small class="text-muted d-block mt-1">Máximo: 2MB. Deixe em branco para manter a atual</small>
                            @error('image_file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Current Image Preview -->
                        @if ($album->image)
                            <div class="mb-4 text-center">
                                <p class="text-muted small">Imagem Atual:</p>
                                <img src="{{ $album->image_url }}" alt="{{ $album->name }}" class="img-fluid rounded"
                                    style="max-width: 250px; max-height: 250px; object-fit: cover;">
                            </div>
                        @endif

                        <!-- Form Actions -->
                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-between">
                            <a href="{{ route('bands.show', $album->band_id) }}" class="btn btn-secondary btn-lg">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>

                            <button type="submit" class="btn btn-warning btn-lg">
                                <i class="bi bi-check-circle"></i> Guardar Alterações
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
