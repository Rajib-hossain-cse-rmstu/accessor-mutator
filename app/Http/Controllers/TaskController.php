<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('layouts.task.index');
    }
    public function create()
    {
        return view('layouts.task.create');
    }
    public function store(Request $request)
    {
        dd($request->all());
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
