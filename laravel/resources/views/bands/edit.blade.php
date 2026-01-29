@extends('layouts.app')

@section('title', 'Editar Artista')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">

            <div class="card">
                <div class="card-header">
                    <h4>Editar Artista</h4>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('bands.update', $band) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name', $band->name) }}" required>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="genre" class="form-label">Género</label>
                            <input type="text" name="genre" id="genre" class="form-control"
                                value="{{ old('genre', $band->genre) }}" required>
                            @error('genre')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="formed_year" class="form-label">Ano de formação</label>
                            <input type="number" name="formed_year" id="formed_year" class="form-control"
                                value="{{ old('formed_year', $band->formed_year) }}" required>
                            @error('formed_year')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descrição</label>
                            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $band->description) }}</textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image_url" class="form-label">Imagem (URL)</label>
                            <input type="url" name="image_url" id="image_url" class="form-control"
                                value="{{ old('image_url', $band->image) }}">
                            @error('image_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="text-center mb-3">
                            <strong>OU</strong>
                        </div>

                        <div class="mb-3">
                            <label for="image_file" class="form-label">Upload de imagem</label>
                            <input type="file" name="image_file" id="image_file" class="form-control">
                            @error('image_file')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        @if ($band->image)
                            <div class="mb-3 text-center">
                                <img src="{{ $band->image_url }}" alt="{{ $band->name }}" class="img-fluid rounded"
                                    style="max-width: 250px;">
                            </div>
                        @endif

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('bands.show', $band) }}" class="btn btn-secondary">
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
