@extends('layouts.app')

@section('content')
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <label for="title">Titlu:</label>
    <input type="text" name="title" id="title">
    <label for="description">Descriere:</label>
    <textarea name="description" id="description"></textarea>
    <label for="category_id">Categorie:</label>
    <select name="category_id" id="category_id">
        @foreach ($categories as $category)
            <option value={{ $category['id'] }}>{{ $category['name'] }}</option>
        @endforeach
    </select>
    <select multiple name="tags[]">
        @foreach ($tags as $tag)
            <option value={{ $tag['id'] }}>{{ $tag['name'] }}</option>
        @endforeach
    </select>
    <button type="submit">Creează Sarcina</button>
</form>

@endsection
