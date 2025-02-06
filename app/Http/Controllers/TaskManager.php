<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Tasks;
use Illuminate\Http\Request;

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
if($task->save()){
    return redirect()->route('dashboard')->with('success', 'Task added successfully');

}
return redirect(route("task.add"))->with("error","Task Not added");

    }

    public function listTasks()
    {
        $tasks = Tasks::all();
        return view("Welcom", compact('tasks'));
    }


    public function editTask($id)
    {
        $task = Tasks::findOrFail($id);
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

        return redirect()->route('dashboard')->with('success', 'Task deleted successfully');
    }
}
