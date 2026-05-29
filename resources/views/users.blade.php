@extends('layouts.app')
@section('content')

<h3 class="mb-3 text-dark">Users List App</h3>

<div style="max-width: 700px; margin-left: 120px;">

    @if(isset($user))

        <div class="card mb-4">
            <div class="card-header small">Update User</div>

            <div class="card-body">

                <form action="{{ url('user/update') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id" value="{{ $user->id }}">

                    <div class="mb-3">
                        <label class="form-label small">Name</label>
                        <input type="text" name="name" class="form-control form-control-sm" value="{{ $user->name }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small">Email</label>
                        <input type="email" name="email" class="form-control form-control-sm" value="{{ $user->email }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small">Password</label>
                        <input type="text" name="password" class="form-control form-control-sm" value="{{ $user->password }}">
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">+ Update User</button>
                </form>

            </div>
        </div>

    @else

        <div class="card mb-4">
            <div class="card-header small">New User</div>

            <div class="card-body">

                <form action="{{ url('user/create') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label small">Name</label>
                        <input type="text" name="name" class="form-control form-control-sm">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small">Email</label>
                        <input type="email" name="email" class="form-control form-control-sm">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small">Password</label>
                        <input type="text" name="password" class="form-control form-control-sm">
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">+ Add User</button>
                </form>

            </div>
        </div>

    @endif


    <div class="card mb-4">
        <div class="card-header small">Current Users</div>

        <div class="card-body">
            <table class="table table-sm">

                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="/user/delete/{{ $user->id }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>

                            <form action="/user/edit/{{ $user->id }}" method="POST" class="d-inline">
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
