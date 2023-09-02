@extends('layouts.app')
@section('content')
    <div id="guest-home">
        <div class="container">
            <div class="row h-100">

                <div class="col-8 py-4 left">
                    <h1>Hello World</h1>
                    <p>I'm Andrea Romano and I am Junior Full Stack Web Developer.</p>

                    <div class="last-projects">
                        @forelse ($projects as $project)
                            <div class="project-title">
                                <a href="#">{{ $project->title }}</a>
                            </div>
                        @empty
                            <h2>Non ci sono progetti</h2>
                        @endforelse
                    </div>
                </div>
                <div class="col-4 right">
                </div>
            </div>
        </div>
        <img class="image-home" src="{{ Vite::asset('resources/img/andrea.jpg') }}" alt="Andrea">
    </div>
@endsection

@section('scripts')
    @vite('resources/js/guest/home.js')
@endsection
