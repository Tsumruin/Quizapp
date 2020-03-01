@extends('layout')

@section('header')
<div class="head-title">
  <h1>Task</h1>
  <a href="/tasks/create">
    <button type="button"  class="btn btn-success btn-lg">
      <i class="fas fa-plus"></i> Create</button>
  </a>
</div>
@endsection


@section('content')

@if ($tasks->count())
  <table class="table table-sm table-striped center">
    <thead>
      @foreach ($columns as $column)
        <th>{{ $column }}</th>
      @endforeach
      <th style="text-align: right;">Option</th>
    </thead>

    @foreach ($tasks as $task)
      <tbody>
          <td>{{ $task->id }}</td>
          <td>{{ $task->subject }}</td>
          <td>{{ $task->description }}</td>
          <td>{{ $task->due_date }}</td>
          <td>
            <input type="checkbox" disabled @if ($task->completed) checked @endif>
          </td>
          <td style="text-align: right;">
            <a href="/tasks/{{ $task->id }}">
              <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Detail</button>
            </a>
            <a href="/tasks/{{ $task->id }}/edit">
              <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
            </a>
            <a href="/tasks/{{ $task->id }}/edit">
              <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
            </a>
          </td>
      </tbody>
    @endforeach

  </table>
@endif



@endsection