@extends('dashboard.dashboardLayout')
@section('title', 'User Details')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>User Details</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>User Type</td>
                                <td>{{ ucfirst($user->usertype) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
