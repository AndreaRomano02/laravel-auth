@extends('layouts.app')

@section('title', $project->title)

@section('content')
    <div class="card">
        @if ($project->img)
            <img src="{{ $project->img }}" class="card-img-top" alt="{{ $project->title }}">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $project->title }}</h5>
            <p class="card-text">{{ $project->description }}</p>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Torna alla lista dei progetti</a>
        </div>
    </div>
@endsection
