@extends('layouts.app')

@section('title', 'Criar Álbum')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="bi bi-plus-circle"></i> Criar Novo Álbum
                    </h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('albums.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Artista -->
                        <div class="mb-3">
                            <label for="band_id" class="form-label">
                                <i class="bi bi-music-note-beamed"></i> Artista
                            </label>
                            <select name="band_id" id="band_id" class="form-select @error('band_id') is-invalid @enderror"
                                required>
                                <option value="">-- Selecione um Artista --</option>
                                @foreach ($bands as $band)
                                    <option value="{{ $band->id }}" {{ old('band_id') == $band->id ? 'selected' : '' }}>
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
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                placeholder="Ex: Abbey Road" required>
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
                                value="{{ old('release_date') }}">
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
                                class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}"
                                placeholder="https://exemplo.com/imagem.jpg">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Separator -->
                        <div class="text-center my-3">
                            <span class="badge bg-secondary">OU</span>
                        </div>

                        <!-- Upload de Imagem -->
                        <div class="mb-4">
                            <label for="image_file" class="form-label">
                                <i class="bi bi-upload"></i> Upload de Imagem
                            </label>
                            <input type="file" name="image_file" id="image_file"
                                class="form-control @error('image_file') is-invalid @enderror" accept="image/*">
                            <small class="text-muted d-block mt-1">Máximo: 2MB. Formatos: JPG, PNG, GIF</small>
                            @error('image_file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Form Actions -->
                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-check-circle"></i> Guardar Álbum
                            </button>

                            <a href="{{ route('home') }}" class="btn btn-secondary btn-lg">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
