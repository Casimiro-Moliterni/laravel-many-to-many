@extends('layouts.admin')
@section('content')
    <h2>Crea un Nuovo Progetto !</h2>

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
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome Progetto</label>
                <input type="text" class="form-control" id="name" placeholder="Es. Comic.com" name="name"
                    value="{{ old('name') }}">
            </div>
           <div class="mb-3">
            <label for="type_id" class="form-label">Types</label>
            <select class="form-select" aria-label="Default select example" id="type_id" name="type_id">
                <option selected>Open this select menu</option>
               @foreach ($types as $type)
               <option @selected($type->id == old('type_id')) value="{{ $type->id }}">{{ $type->name }}</option>
               @endforeach
              </select>
           </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Immagine</label>
                <input class="form-control" type="file" id="thumb" name="thumb">
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Testo</label>
                <textarea class="form-control" id="summary" rows="3" name="summary">{{ old('summary') }}</textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
        </form>
    </div>
@endsection
