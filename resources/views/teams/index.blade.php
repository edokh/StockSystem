@extends('dashboard.dashboardLayout')
@section('title', 'Teams')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Teams</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('teams.create') }}" class="btn btn-primary mb-3">Create Team</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                                <tr>
                                    <td>{{ $team->id }}</td>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->team_type }}</td>
                                    <td>
                                        <a href="{{ route('teams.show', $team->id) }}" class="btn btn-primary">View</a>
                                        <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-secondary">Edit</a>
                                        <form class="d-inline-block" action="{{ route('teams.destroy', $team->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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
