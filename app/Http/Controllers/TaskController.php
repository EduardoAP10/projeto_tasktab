<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('dashboard', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'difficulty' => 'required|string',
            'xp' => 'nullable|integer',
            'reward' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|string',
        ]);

        // Padroniza o status (ex: "pendente" → "Pendente")
        $request->merge([
            'status' => ucfirst(strtolower($request->status)),
        ]);

        Task::create($request->only([
            'title',
            'description',
            'difficulty',
            'xp',
            'reward',
            'due_date',
            'status'
        ]));

        return redirect()->route('tasks.kanban')->with('success', 'Tarefa criada e adicionada ao Kanban!');
    }


    public function create()
    {
        return view('tasks.create');
    }

    public function kanban()
    {
        $tarefas = \App\Models\Task::all()->groupBy('status');
        return view('tasks.kanban', compact('tarefas'));
    }

    public function updateStatus(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        $task->status = ucfirst(strtolower($request->status));
        $task->save();

        return response()->json(['success' => true]);
    }
}
