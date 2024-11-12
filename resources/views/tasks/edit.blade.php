@extends('layouts.app')

@section('content')
    <h1>Editare Sarcină</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titlu:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $task->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descriere:</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="category_id">Categorie:</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $task->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tags">Etichete:</label>
            <select name="tags[]" id="tags" class="form-control" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" 
                        {{ $task->tags->contains($tag->id) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvează Modificările</button>
    </form>

    <a href={{ route('tasks.show', $task->id)}}><- Intoarcete</a>
@endsection