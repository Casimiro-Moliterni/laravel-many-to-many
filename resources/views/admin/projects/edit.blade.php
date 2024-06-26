@extends('layouts.admin')
@section('content')
    <h2>Mofica il Progetto : <strong>{{ $project->name }}</strong></h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome Progetto</label>
                <input type="text" class="form-control" id="name" placeholder="Es. Comic.com" name="name"
                    value="{{ old('name', $project->name) }}">
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Types</label>
                <select class="form-select" aria-label="Default select example" id="type_id" name="type_id">
                    <option value="">Open this select menu</option>
                    @foreach ($types as $type)
                        <option @selected($type->id == old('type_id', $project->type_id)) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <h5>Technologies</h5>
            @foreach ($technologies as $technology)
                <div class="mb-3">
                    <input class="form-check-input "  type="checkbox"
                    @checked(in_array($technology->id , old('technologies',[])))
                     value="{{ $technology->id }}" 
                     id="technology-{{ $technology->id }}" name=" technologies[] ">
                    <label class="form-check-label" for="technology-{{ $technology->id }}">
                        {{ $technology->name }}
                    </label>
                </div>
            @endforeach
            <div class="mb-3">
                <label for="thumb" class="form-label">Immagine</label>
                <input class="form-control" type="file" id="thumb" name="thumb">
                @if ($project->thumb)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $project->thumb) }}" alt="{{ $project->name }}">
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Testo</label>
                <textarea class="form-control" id="summary" rows="3" name="summary">{{ old('summary', $project->summary) }}</textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
        </form>
    </div>
@endsection
