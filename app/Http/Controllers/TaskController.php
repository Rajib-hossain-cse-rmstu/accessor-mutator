<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('creator', 'getUser')->get();
        // dd($tasks);
        return view('layouts.task.index', compact('tasks'));
    }
    public function create()
    {
        $users = User::all();
        return view('layouts.task.create', compact('users'));
    }
    public function store(Request $request)
    {
        // $create = $request->validate([
        //     'title' => 'required|string|max:30',
        //     'details' => 'required|string|max:255',
        //     'user_id' => 'required|',
        // ]);

        // dd($create);
        $create = Task::create([
            'title' => $request->title,
            'details' => $request->details,
            'creator_id' => auth()->user()->id,
            'starting_time' => $request->starting_time,
            'ending_time' => $request->ending_time,
            'starting_date' => $request->starting_date,
            'ending_date' => $request->ending_date,
            'user_id' => json_encode($request->user_id),
        ]);


        return redirect()->route('home');
    }
    Public function edit($id)
    {
        dd($id);
    }
    Public function update(Request $request, $id)
    {
        dd($request->all());
    }
    public function delete($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->back();
    }
}
