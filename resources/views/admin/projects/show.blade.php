@extends('layouts.admin')
@section('content')
    <h2>{{ $project->name }}</h2>
    <div>
        <strong>Slug :</strong>{{ $project->slug }}
    </div>
    @if ($project->type)
        <div>
            <strong>Types:</strong>{{ $project->type->name }}
        </div>
    @endif
    <div>
        <strong>Technologies:</strong>
        @if (count($project->Technologies))
            @foreach ($project->technologies as $technology)
                {{ $technology->name }}@if (!$loop->last),@endif
            @endforeach        
            @else
                none technology
        @endif
    </div>
    @if ($project->thumb)
        <div>
            <img src="{{ asset('storage/' . $project->thumb) }}" alt="{{ $project->name }}">
        </div>
    @endif
    <div class="mt-1">
        <strong>Created at :</strong>{{ $project->created_at }}
    </div>
    <div class="mb-4  border-bottom">
        <strong>Update at :</strong>{{ $project->updated_at }}
    </div>
    @if ($project->summary)
        <p class="mt-5"><strong>Content:</strong>{{ $project->summary }}</p>
    @endif
    <div>
        <span><strong>Azioni:</strong></span>
        <div class="d-flex align-items-center gap-4">
            <a class="ms_update_icon btn btn-success"
                href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">
                <i class="fa-solid fa-pen"></i>
            </a>
            <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i>
                </button>
            </form>
            <a class="my_arrow_show" href="{{ route('admin.projects.index') }}"><i
                    class="fa-solid fa-arrow-turn-up"></i></a>
        </div>
    </div>
@endsection
