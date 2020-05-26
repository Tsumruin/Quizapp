<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class QuizController extends Controller
{
    // public function getColList()
    // {
    //     return Schema::getColumnListing('tasks');
    // }

    public function index()
    {
        $columns = [
            'id',
            'subject',
            'description',
            'due_date',
            'completed'
        ];
        return view('tasks.index', [
            'tasks' => Quiz::orderBy('completed')->orderBy('id')->orderBy('due_date')->get($columns),
            'columns' => $columns
        ]);
    }

    public function show($id){
        $task = Quiz::find($id);
        return view('tasks.show', ['task' => $task]);
    }

    public function store()
    {
        request()->validate([
            'subject' => 'required',
            'due_date' => 'required'
        ]);

        $task = new Quiz();
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

    public function edit($id)
    {
        $task = Quiz::find($id);
        return view('tasks.edit', ['task' => $task]);
    }

    public function update($id)
    {
        request()->validate([
            'subject' => 'required',
            'due_date' => 'required'
        ]);
        $task = Quiz::find($id);

        $task->subject = request('subject');
        $task->description = request('description');
        $task->due_date = request('due_date');
        $task->completed = request('completed');

        $task->save();

        return redirect('/tasks');
    }

    public function delete($id){
        Quiz::destroy($id);
        return redirect('/tasks');
    }
}