<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskManager extends Controller
{
    public function addTask()
    {
        return view('tasks.add');
    }


    public function addTaskPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required'
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('tasks.list')->with('success', 'Task added successfully');
    }

    public function listTasks()
    {
        $tasks = Task::all();
        return view('tasks.list', compact('tasks'));
    }


    public function editTask($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }


    public function updateTask(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date'
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->deadline = $request->deadline;


        if($task->save()){
            return redirect(route("tasks.add"));

        }
    }

    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.list')->with('success', 'Task deleted successfully');
    }
}
