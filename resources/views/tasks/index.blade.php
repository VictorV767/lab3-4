@extends('layouts.app')

@section('content')
    <h1>Lista Sarcinilor</h1>



        <ul class="task-list">
            @foreach($tasks as $task)
            <div class="tasks">
                <li>
                    <div>
                        <h2>Title</h2>
                        <h3>{{ $task->title }}</h3>
                    </div>
                    <div>
                        <h2>Description</h2>
                        <p>{{ $task->description }}</p>
                    </div>
                    <p>
                        <p><strong>Categorie:</strong> {{ $task->category->name }}</p>
                        
                        <p><strong>Etichete:</strong>
                            @foreach ($task->tags as $tag)
                            <span class="tag">{{ $tag->name }}</span>
                            @endforeach
                        </p>
                    </div>
                    @endforeach
                </ul>
                @endsection
                