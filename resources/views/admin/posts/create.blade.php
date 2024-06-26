@extends('layouts.admin')
@section('content')
    <h1>Create page</h1>
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Titolo...">
        </div>
        @csrf
        <div class="mb-3">
            <label for="type" class="form-label">Tipologia</label>
            <select class="form-select" id="type" name="type">
                <option disabled selected>Seleziona una tipologia</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" id="content" maxlength="500" name="content" placeholder="Contenuto..."></textarea>
        </div>

        <div class="col-6 mb-3">
            <h4>Seleziona tecnologie</h4>
            <ul class="list-group">
                @foreach ($technologies as $tech)
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="{{$tech->id}}" id="tech-{{$tech->id}}" name="technologies[]">
                        <label class="form-check-label" for="technologies">{{$tech->name}}</label>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mb-3">
            <button class="btn btn-success">Salva</button>
        </div>

    </form>
@endsection
