@extends('layout')


@section('header')
<div class="head-title">
    <h1>Detail</h1>
    <button type="button" onclick="history.back()" class="btn btn-primary">戻る</button>
</div>    
@endsection

@section('content')
<div class="card center">
    <h5 class="card-header">{{ $quiz->subject }}</h5>
    <div class="card-body row no-gutters">
        <div class="col-12">
            <div class="card-title">
                Description
            </div>
            <div>
                @if ($quiz->description)
                    {{ $quiz->description }}
                @else
                    No Description
                @endif
                
            </div>
        </div>
        <div class="col-6">
            <div class="card-title">
                Due Date
            </div>
            <div>
                @if ($quiz->due_date)
                    {{ $quiz->due_date }}
                @else
                    No Time Limit
                @endif
                {{ $quiz->due_date }}
            </div>
        </div>
        <div class="col-6">
            <div class="card-title">
                Condition
            </div>
            <div>
                @if ($quiz->completed)
                    Done
                @else
                    Undergoing
                @endif
            </div>
        </div>
    </div>
</div>
@endsection