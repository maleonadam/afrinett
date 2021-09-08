<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function create()
    {
        $todos = Todo::orderBy('completed')->get();

        return view('todos.create', compact('todos'));
    }

    public function store(StoreTodoRequest $request, Todo $todo)
    {
        $todo->create($request->validated());

        return redirect()->route('todos.create', ['todo']);
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Todo $todo)
    {
        if ($todo->completed == 1) {
            $todo->update(['completed' => false]);
        } else {
            $todo->update(['completed' => true]);
        }

        return redirect()->route('todos.create', ['todo']);
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.create', ['todo']);
    }
}
