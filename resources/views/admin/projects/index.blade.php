@extends('layouts.app')
@section('title', 'Projects')

@section('content')
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Descrizione</th>
                <th scope="col"></th>
                <th scope="col">URL</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    {{-- * Titolo --}}
                    <th>{{ $project->title }}</th>

                    {{-- * Descrizione --}}
                    <td>{{ $project->description }}</td>

                    {{-- * Url Immagine --}}
                    <td>{{ $project->img }}</td>

                    {{-- * Link GitHub --}}
                    <td><a href="{{ $project->url }}">{{ $project->url }}</a></td>
                    <td>
                        <div class="d-flex justify-content-end gap-2">
                            {{-- # SHOW --}}
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info"><i
                                    class="fas fa-eye"></i></a>

                            {{-- # EDIT --}}
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning"><i
                                    class="fas fa-pencil"></i></a>

                            {{-- # DELETE --}}
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        <h1>NON CI SONO PROGETTI</h1>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
