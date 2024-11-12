@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
<li>
    <h3>{{ $task->title }}</h3>
    <p>{{ $task->description }}</p>
    <p>
        <p><strong>Categorie:</strong> {{ $task->category->name }}</p>

        <p><strong>Etichete:</strong>
            @foreach ($task->tags as $tag)
                <span class="tag">{{ $tag->name }}</span>
            @endforeach
    </p>
    <div class="btns">
        <a href={{ route('tasks.edit', $task->id) }}>Edit</a>
        
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Sigur doriți să ștergeți această sarcină?')">Șterge Sarcina</button>
        </form>
    </div>


@endsection
