<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class Taskcontroller extends Controller
{
    public function index()
    {
       // $tasks = DB :: table (table:'tasks')-> get();
          $tasks = Task::all();
        return view('tasks',compact('tasks'));
    }

    public function create(Request $request)
    {
      $validate =$request->validate([
        'name' =>'required|max:10|min:3 '
      ]);
      //dd($request->name);
      $task_name = $request->name;
      // DB:: table(table: 'tasks')-> insert(values: ['name'=> $task_name]);
      $task = new Task;
      $task ->name = $task_name;
      $task-> save();
      return redirect() -> back();
    }
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()-> back();
    }
    public function edit($id)
    {
       $task = Task::find($id);
       $tasks = Task::all();
       return view('tasks', compact('task', 'tasks'));
    }

    public function update(Request $request)
{
    $request->validate([
        'name' => 'required|min:3|max:10'
    ]);

    $task = Task::find($request->id);
    $task->name = $request->name;
    $task->save();

    return redirect('tasks');
}
}
