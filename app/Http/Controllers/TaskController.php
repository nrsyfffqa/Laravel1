<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Task; // Add this line to import the Task model

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'type' => 'required',
            'duedate' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'duedate' => $request->duedate,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('task.create')->with('success', 'Task Created successfully.');
    }

    public function create()
{
    $users = User::all();
return view('task.create', compact('users'));
}
public function index()
{
#call the orm with user() method on model Task
$tasks = Task::with('user')->get();
return view('task.index', compact('tasks' ));
}
public function show($id)
{
$task = Task::find($id);
return view('task.show', compact('task'));
}
public function update(Request $request, $id)
{
$request->validate([
'title' => 'required|max:255',
'description' => 'required',
'type' => 'required',
'duedate' => 'required',
]);
$task = Task::find($id);
// $task->update($request->all()); #for all
$task->update([
'title' => $request->title,
'description' => $request->description,
'type' => $request->type,
'duedate' => $request->duedate,
'user_id' => $request->user_id
]);
return redirect()->route('tasks.index')->with('success', 'Taks updated successfully');
}
public function edit($id)
{
$task = Task::find($id);
$users = User::all();
return view('tasks.edit', compact('task', 'users'));
}
public function destroy($id)
{
$task = Task::find($id);
$task->delete();
return redirect()->route('tasks.index')->with('success', 'Task Deleted successfully');
}
}

