@extends('layouts.admin')
@section('content')
    <h1>Progetti del Sito</h1>
        <table class="table  text-center">
            <thead>
                <tr class="my_tr_active">
                    <th>id</th>
                    <th>name</th>
                    <th>slug</th>
                    <th>create at</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr class="my_tr_active">
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->slug }}</td>
                        <td>{{ $project->created_at }}</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center gap-3">
    
                                <a class="btn btn-primary"
                                    href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">view</a>
    
                                <a class="ms_update_icon btn btn-success"
                                    href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <div>
                                    <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
    
                                        <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
