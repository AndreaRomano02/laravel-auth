@extends('layouts.app')
@section('title', 'Projects')

@section('content')
    <header class="text-end my-5">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-success">Crea un progetto</a>
    </header>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Descrizione</th>
                <th scope="col"></th>
                <th scope="col">URL</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $key => $project)
                <tr>
                    {{-- * Indice --}}
                    <th class="align-middle">{{ $key + 1 }}</th>

                    {{-- * Titolo --}}
                    <th class="align-middle">{{ $project->title }}</th>

                    {{-- * Descrizione --}}
                    <td class="align-middle">{{ $project->getAbstract() }}</td>

                    {{-- * Url Immagine --}}
                    <td class="align-middle">{{ $project->img }}</td>

                    {{-- * Link GitHub --}}
                    <td class="align-middle"><a href="{{ $project->url }}" target="_blank">{{ $project->url }}</a></td>
                    <td class="align-middle">
                        <div class="d-flex justify-content-end gap-2">
                            {{-- # SHOW --}}
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info"><i
                                    class="fas fa-eye"></i></a>

                            {{-- # EDIT --}}
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning"><i
                                    class="fas fa-pencil"></i></a>

                            {{-- # DELETE --}}
                            <form class="destroy-form" action="{{ route('admin.projects.destroy', $project) }}"
                                method="POST" data-title="{{ $project->title }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        <h1>NON CI SONO PROGETTI</h1>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@section('scripts')
    @vite('resources/js/destroy-form.js')
@endsection
