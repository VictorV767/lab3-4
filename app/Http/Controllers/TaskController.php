<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Models\Tag;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // List of tasks
    public function index()
    {
        $tasks = Task::with(['category', 'tags'])->get();
        return view('tasks.index', compact('tasks'));
    }

    // Show a single task
    public function show($id)
    {
        $task = Task::with(['category', 'tags'])->findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    // Create a new task form
    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        return view('tasks.create', compact('categories', 'tags'));
    }

    // Store a new task
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array', 
            'tags.*' => 'exists:tags,id'
        ]);

        $task = new Task;
        $task->title = $validatedData['title'];
        $task->description = $validatedData['description'];
        $task->category_id = $validatedData['category_id'];
        $task->save();

        if(isset($validatedData['tags'])) {
            $task->tags()->attach($validatedData['tags']);
        }

        return redirect()->route('tasks.index')->with('success', 'Sarcina a fost createa cu succes');
    }

    // Edit an existing task
    public function edit($id)
    {
        $task = Task::with('tags')->findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('tasks.edit', compact('task', 'categories', 'tags'));
    }

    // Update the task
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);
    
        $task = Task::findOrFail($id);
        $task->title = $validatedData['title'];
        $task->description = $validatedData['description'];
        $task->category_id = $validatedData['category_id'];
        $task->save();
    
        if (isset($validatedData['tags'])) {
            $task->tags()->sync($validatedData['tags']);
        } else {
            $task->tags()->detach();
        }
    
        return redirect()->route('tasks.index')->with('success', 'Sarcina a fost actualizată cu succes!');
    }

    // Delete a task
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Sarcina a fost ștearsă cu succes!');
    }

    
}
