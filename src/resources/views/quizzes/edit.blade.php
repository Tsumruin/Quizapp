@extends('layout')

@section('header')
<div class="head-title">
    <h1>Edit</h1>
    <button type="button" onclick="history.back()" class="btn btn-primary">戻る</button>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form method='POST' action='/quizzes/{{ $quiz->id }}'>
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="subject" class="control-label">Subject</label>
                @error('subject')
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('subject') }}
                    </div>
                @enderror
                <input
                    type="text"
                    name="subject"
                    class="form-control"
                    id="subject"
                    value="{{ $quiz->subject }}"
                >
            </div>
            <div class="form-group">
                <label for="description" class="control-label">Description</label>
                <textarea
                    type="text"
                    name="description"
                    class="form-control"
                    id="description"
                >{{ $quiz->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="due_date-field">Due Date</label>
                @error('due_date')
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('due_date') }}
                    </div>
                @enderror
                <input 
                    type="text"
                    name="due_date"
                    class="form-control"
                    id="due_date"
                    value="{{ $quiz->due_date }}"
                >
            </div>
            <div class="form-group">
                <label for="completed-field" class="control-label">Condition</label>
                <div>
                    <input id="done" type="radio" name="completed" value="1" @if ($quiz->completed) checked @endif> 
                    <label for="done">Done</label>
                    <br>
                    <input id="not" type="radio" name="completed" value="0" @if (!$quiz->completed) checked @endif>
                    <label for="not">Not Yet</label>
                </div>
                </div>
            <div class="form-submit">
                <button type="submit" class="btn btn-success btn-lg"><i class="fas fa-paper-plane"></i> 送信</button>
            </div>
        </form>
    </div>
</div>
@endsection