@extends('dashboard.dashboardLayout')
@section('title', 'Team Members')


@section('content')
    <div class="row  ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Team Members</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Staff</th>
                                <th scope="col">Team</th>
                                <th scope="col">Role</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teamMembers as $teamMember)
                                <tr>
                                    <th scope="row">{{ $teamMember->id }}</th>
                                    <td>{{ $teamMember->user }} - {{ $teamMember->department }}</td>
                                    <td>{{ $teamMember->team }}</td>
                                    <td>{{ $teamMember->role }}</td>
                                    <td>
                                        <a href="{{ route('team-members.edit', $teamMember->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form method="POST" action="{{ route('team-members.destroy', $teamMember->id) }}"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this team member?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('team-members.create') }}" class="btn btn-primary">Create Team</a>
                </div>
            </div>
        </div>
    </div>
@endsection
