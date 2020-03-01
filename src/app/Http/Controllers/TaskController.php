<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class TaskController extends Controller
{
    // public function getColList()
    // {
    //     return Schema::getColumnListing('tasks');
    // }

    public function display()
    {
        $columns = [
            'id',
            'subject',
            'description',
            'due_date',
            'completed'
        ];
        return view('tasks.index', [
            'tasks' => Task::orderBy('id')->get($columns),
            'columns' => $columns
        ]);
    }

    public function show($id){
        $task = Task::find($id);
        return view('tasks.show', ['task' => $task]);
    }

    public function store()
    {
        request()->validate([
            'subject' => 'required',
            'due_date' => 'required'
        ]);

        $task = new Task();
        $task->subject = request('subject');
        $task->description = request('description');
        $task->due_date = request('due_date');

        $task->save();

        return redirect('/tasks');
    }

    public function create()
    {
        return view('tasks.create');
    }
}
