@extends('layouts.app')

@section('title', "Modifica $project->title")

@section('content')

    <form class="row" action="{{ route('admin.projects.update', $project) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        <div class="mb-3 col-6">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                value="{{ old('title', $project->title) }}" required>
            <div class="invalid-feedback">
                {{ $errors->first('title') }}
            </div>
        </div>
        <div class="mb-3 col-6">
            <label for="url" class="form-label">URL</label>
            <input type="url" class="form-control @error('url') is-invalid @enderror" name="url" id="url"
                value="{{ old('url', $project->url) }}" required>
            <div class="invalid-feedback">
                {{ $errors->first('url') }}
            </div>
        </div>
        <div class="mb-3 col-12">
            <label for="img" class="form-label">Immagine</label>
            <input type="url" class="form-control @error('img') is-invalid @enderror" name="img" id="img"
                value="{{ old('img', $project->img) }}">
            <div class="invalid-feedback">
                {{ $errors->first('img') }}
            </div>
        </div>
        <div class="col-12 mb-3">
            <label for="description" class="form-label @error('description') is-invalid @enderror">Descrizione</label>
            <textarea class="form-control" name="description" id="description" rows="5">{{ old('description', $project->description) }}</textarea>
            <div class="invalid-feedback">
                {{ $errors->first('description') }}
            </div>
        </div>

        <div class="text-end">
            <button type="reset" class="btn btn-danger ">Reset</button>
            <button class="btn btn-success">Modifica</button>
        </div>
    </form>
@endsection
