@extends('dashboard.dashboardLayout')
@section('title', 'Teams')
@section('content')
    <h1>Teams</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $team)
                <tr>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->teamable_type }}</td>
                    <td>
                        <a href="{{ route('teams.show', $team->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('teams.create') }}" class="btn btn-success">Create Team</a>
@endsection
