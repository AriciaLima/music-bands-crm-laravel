@extends('layouts.app')

@section('title', 'Criar Artista')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="bi bi-plus-circle"></i> Criar Novo Artista
                    </h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('bands.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Nome -->
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="bi bi-type"></i> Nome
                            </label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                placeholder="Ex: The Beatles" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Género -->
                        <div class="mb-3">
                            <label for="genre" class="form-label">
                                <i class="bi bi-music-note-beamed"></i> Género
                            </label>
                            <input type="text" name="genre" id="genre"
                                class="form-control @error('genre') is-invalid @enderror" value="{{ old('genre') }}"
                                placeholder="Ex: Rock, Pop, Jazz" required>
                            @error('genre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ano de Formação -->
                        <div class="mb-3">
                            <label for="formed_year" class="form-label">
                                <i class="bi bi-calendar"></i> Ano de Formação
                            </label>
                            <input type="number" name="formed_year" id="formed_year"
                                class="form-control @error('formed_year') is-invalid @enderror"
                                value="{{ old('formed_year') }}" placeholder="Ex: 1960" min="1900"
                                max="{{ date('Y') }}" required>
                            @error('formed_year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Descrição -->
                        <div class="mb-3">
                            <label for="description" class="form-label">
                                <i class="bi bi-chat-left-text"></i> Descrição
                            </label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                rows="3" placeholder="Informações sobre o artista...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Imagem por URL -->
                        <div class="mb-3">
                            <label for="image_url" class="form-label">
                                <i class="bi bi-image"></i> Imagem (URL)
                            </label>
                            <input type="url" name="image_url" id="image_url"
                                class="form-control @error('image_url') is-invalid @enderror"
                                value="{{ old('image_url') }}" placeholder="https://exemplo.com/imagem.jpg">
                            @error('image_url')
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
                                <i class="bi bi-check-circle"></i> Guardar Artista
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
