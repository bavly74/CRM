<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $data = Task::with('project')->get(); // Fetch all tasks
        return view('tasks.index', compact('data')); // Return the view with tasks data
    }

    public function create()
    {
        // Logic to show the form for creating a new task
    }

    public function store(Request $request)
    {
        // Logic to store a new task
    }

    public function show(Task $task)
    {
        // Logic to display a specific task
    }
}
