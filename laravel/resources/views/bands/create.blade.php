@extends('layouts.app')

@section('title', 'Criar Banda')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-md-8">

            <div class="card">
                <div class="card-body">

                    <h2 class="mb-4">Criar novo artista</h2>

                    <form method="POST" action="{{ route('bands.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Género</label>
                            <input type="text" name="genre" class="form-control" value="{{ old('genre') }}" required>
                            @error('genre')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ano de formação</label>
                            <input type="number" name="formed_year" class="form-control" value="{{ old('formed_year') }}"
                                required>
                            @error('formed_year')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Imagem (URL)</label>
                            <input type="url" name="image_url" class="form-control" value="{{ old('image_url') }}">
                            @error('image_url')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center mb-2">
                            <strong>OU</strong>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Upload de imagem</label>
                            <input type="file" name="image_file" class="form-control">
                            @error('image_file')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descrição</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">
                                Guardar
                            </button>

                            <a href="{{ route('home') }}" class="btn btn-secondary">
                                Cancelar
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection
