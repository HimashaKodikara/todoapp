<?php

namespace App\Http\Controllers;

//use App\Models\Task;
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
        try{
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'deadline' => 'required'
            ]);

            $task = new Tasks();
            $task->title = $request->title;
            $task->description = $request->description;
            $task->deadline = $request->deadline;
            $task->save();
            return redirect()-> route('dashboard');



        }catch(Exception $e){
            return redirect()->route('dashboard');
        }
    }

    public function dashboard()
    {
        $tasks = Tasks::where("status", NULL)->get();

        return view('dashboard',[
            'tasks' => $tasks
        ]);
    }


    public function listTasks()
    {

        return view("Welcome", compact('tasks'));
    }


    public function editTask($id)
    {
        $task = Tasks::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }




    public function updaeTaskStatus($id){
        if(Tasks::where('id', $id)->update(['status' =>"complete"])){
            return redirect(route("dashboard"))->with("success","Task Completed");
        }
        return redirect(route("dashboard"))->with("error","error occur");
    }

    public function deleteTask($id)
    {
        if(Tasks::where('id', $id)->delete()){
            return redirect(route("dashboard"))->with("success","Task deleted");
        }
        return redirect(route("dashboard"))->with("error","error occur deleting");
    }
}
