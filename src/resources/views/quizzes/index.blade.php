@extends('layout')

@section('header')
<div class="head-title">
  <h1>Quiz List</h1>
  <a href="/quizzes/create">
    <button type="button"  class="btn btn-success btn-lg">
      <i class="fas fa-plus"></i> Create</button>
  </a>
</div>
@endsection


@section('content')

@if ($quizzes->count())
  <table class="table table-sm table-striped center">
    <thead>
      @foreach ($columns as $column)
        <th>{{ $column }}</th>
      @endforeach
      <th style="text-align: right;">Option</th>
    </thead>

    <tbody>
    @foreach ($quizzes as $quiz)
        @php $quiz->completed ? $flag = true : $flag = false @endphp
        <tr style="background-color: @if ($flag) rgba(0, 0, 0, 0.05) @else #ffffff @endif;">
          <td>{{ $quiz->id }}</td>
          <td>{{ $quiz->subject }}</td>
          <td>{{ $quiz->description }}</td>
          <td>{{ $quiz->due_date }}</td>
          <td>
            <input type="checkbox" disabled @if ($quiz->completed) checked @endif>
          </td>
          <td style="text-align: right;">
            <a href="/quizzes/{{ $quiz->id }}">
              <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Detail</button>
            </a>
            <a href="/quizzes/{{ $quiz->id }}/edit">
              <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
            </a>
            <form action="/quizzes/{{ $quiz->id }}" method="POST" style="display: inline;" onsubmit="return confirm('Do you really delete this?');">
              @csrf
              @method('delete')
              <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
            </form>
          </td>
        </tr>
    @endforeach
  </tbody>

  </table>
@endif



@endsection