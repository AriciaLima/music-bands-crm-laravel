@extends('layouts.app')

@section('title', 'Criar Álbum')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-md-8">

            <div class="card">
                <div class="card-body">

                    <h2 class="mb-4">Criar novo álbum</h2>

                    <form method="POST" action="{{ route('albums.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Artista</label>
                            <select name="band_id" class="form-control" required>
                                <option value="">Selecione um Artista</option>
                                @foreach ($bands as $band)
                                    <option value="{{ $band->id }}">{{ $band->name }}</option>
                                @endforeach
                            </select>
                            @error('band_id')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nome do álbum</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Data de lançamento</label>
                            <input type="date" name="release_date" class="form-control"
                                value="{{ old('release_date') }}">
                            @error('release_date')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Imagem (URL)</label>
                            <input type="url" name="image" class="form-control" value="{{ old('image') }}">
                            @error('image')
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
