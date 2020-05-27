@extends('layout')

@section('header')
<div class="head-title">
    <h1>Create New Quiz</h1>
    <button type="button" onclick="history.back()" class="btn btn-primary">戻る</button>
</div>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form method='POST' action='/quizzes'>
                @csrf
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
                        value="{{ old('subject') }}"
                    >
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">Description</label>
                    <textarea
                        type="text"
                        name="description"
                        class="form-control"
                        id="description"
                    >{{ old('description') }}</textarea>
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
                        value="{{ old('due_date') }}"
                    >
                </div>
                <div class="form-submit">
                    <button type="submit" class="btn btn-success btn-lg"><i class="fas fa-paper-plane"></i> 送信</button>
                </div>
            </form>
        </div>
    </div>
@endsection