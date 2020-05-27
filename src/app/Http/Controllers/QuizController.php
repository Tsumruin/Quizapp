<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class QuizController extends Controller
{
    public function index()
    {
        $columns = [
            'id',
            'subject',
            'description',
            'due_date',
            'completed'
        ];
        return view('quizzes.index', [
            'quizzes' => Quiz::orderBy('completed')->orderBy('id')->orderBy('due_date')->get($columns),
            'columns' => $columns
        ]);
    }

    public function show($id){
        $quiz = Quiz::find($id);
        return view('quizzes.show', ['quiz' => $quiz]);
    }

    public function store()
    {
        request()->validate([
            'subject' => 'required',
            'due_date' => 'required'
        ]);

        $quiz = new Quiz();
        $quiz->subject = request('subject');
        $quiz->description = request('description');
        $quiz->due_date = request('due_date');

        $quiz->save();

        return redirect('/quizzes');
    }

    public function create()
    {
        return view('quizzes.create');
    }

    public function edit($id)
    {
        $quiz = Quiz::find($id);
        return view('quizzes.edit', ['quiz' => $quiz]);
    }

    public function update(Quiz $quiz)
    {
        request()->validate([
            'subject' => 'required',
            'due_date' => 'required'
        ]);

        $quiz->subject = request('subject');
        $quiz->description = request('description');
        $quiz->due_date = request('due_date');
        $quiz->completed = request('completed');

        $quiz->save();

        return redirect('/quizzes');
    }

    public function destroy(Quiz $quiz){
        $quiz->delete();
        return redirect('/quizzes');
    }
}