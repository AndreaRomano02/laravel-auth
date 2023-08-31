@extends('layouts.app')

@section('title', "Modifica $project->title")

@section('content')
    <form class="row" action="{{ route('admin.projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 col-6">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $project->title }}" required>
        </div>
        <div class="mb-3 col-6">
            <label for="url" class="form-label">URL</label>
            <input type="url" class="form-control" name="url" id="url" value="{{ $project->url }}" required>
        </div>
        <div class="mb-3 col-12">
            <label for="img" class="form-label">Immagine</label>
            <input type="url" class="form-control" name="img" id="img" value="{{ $project->img }}">
        </div>
        <div class="col-12 mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" name="description" id="description" rows="5">{{ $project->description }}</textarea>
        </div>

        <div class="text-end">
            <button type="reset" class="btn btn-danger ">Reset</button>
            <button class="btn btn-success">Modifica</button>
        </div>
    </form>
@endsection
