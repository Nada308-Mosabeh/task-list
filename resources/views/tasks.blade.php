@extends('layouts.app')
@section('content')

<h3 class="mb-3 text-dark">Task List App</h3>

<div style="max-width: 700px; margin-left: 120px;">

    @if(isset($task))
        <div class="card mb-4">
            <div class="card-header small">Update Task</div>
            <div class="card-body">

                <form action="{{ url('update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $task->id }}">

                    <div class="mb-3">
                        <label class="form-label small">Task</label>
                        <input type="text" name="name" class="form-control form-control-sm" value="{{ $task->name }}">
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">+ Update Task</button>
                </form>

            </div>
        </div>
    @else
        <div class="card mb-4">
            <div class="card-header small">New Task</div>
            <div class="card-body">

                <form action="/create" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label small">Task</label>
                        <input type="text" name="name" class="form-control form-control-sm">
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">+ Add Task</button>
                </form>

            </div>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header small">Current Tasks</div>

        <div class="card-body">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->name }}</td>
                        <td>
                            <form action="/delete/{{ $task->id }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>

                            <form action="/edit/{{ $task->id }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-info btn-sm">
                                    Edit
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

</div>

@endsection
