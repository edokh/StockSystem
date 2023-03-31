@extends('dashboard.dashboardLayout')
@section('title', 'Team Details')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Team Details</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $team->id }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $team->name }}</td>
                            </tr>
                            <tr>
                                <td>Team Type</td>
                                <td>{{ ucfirst($team->team_type) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('teams.edit', $team) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('teams.destroy', $team) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
