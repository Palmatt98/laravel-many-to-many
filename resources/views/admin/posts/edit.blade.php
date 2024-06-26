@extends('layouts.admin')
@section('content')
    <h1>Modifica post</h1>
    <form action="{{ route('admin.posts.update', ['post' => $post->slug]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Titolo..."
                value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipologia</label>
            <select class="form-select" id="type" name="type">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id == $post->type->id ? 'selected' : '' }}>
                        {{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" id="content" maxlength="500" name="content" placeholder="Contenuto...">{{ $post->content }}</textarea>
        </div>
        <div class="col-6 mb-5">
            <h4>seleziona tecnologie</h4>
            <ul class="list-group">
                @foreach ($technologies as $tech)
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="{{ $tech->id }}"
                            id="tech-{{ $tech->id }}" name="technologies[]"
                            {{ in_array($tech->id, $post->technologies->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <label class="form-check-label" for="technologies">{{ $tech->name }}</label>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Salva</button>
        </div>

    </form>
@endsection
