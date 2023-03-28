@extends('dashboard.dashboardLayout')
@section('title', 'Edit User')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit User</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="usertype">Usertype</label>
                            <select class="form-control" id="usertype" name="usertype" required>
                                <option value="">-- Select Usertype --</option>
                                <option value="admin" @if ($user->usertype == 'admin') selected @endif>Admin</option>
                                <option value="user" @if ($user->usertype == 'user') selected @endif>User</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('users.show', $user) }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
