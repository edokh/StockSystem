@extends('dashboard.dashboardLayout')
@section('title', 'Users')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Users</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Create User</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Usertype</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->user_id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->usertype }}</td>
                                    <td>
                                        <a href="{{ route('users.show', $user) }}" class="btn btn-primary">View</a>
                                        <a href="{{ route('users.edit', $user) }}" <a
                                            href="{{ route('users.edit', $user) }}" class="btn btn-secondary">Edit</a>
                                        <form class="d-inline-block" action="{{ route('users.destroy', $user) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
