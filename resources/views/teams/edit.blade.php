@extends('dashboard.dashboardLayout')
@section('title', 'Edit Team')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Team</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('teams.update', $team) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $team->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="team_type">Team Type</label>
                            <select class="form-control" id="team_type" name="team_type" required>
                                <option value="">-- Select team_type --</option>
                                <option value="faculty" @if ($team->team_type == 'faculty') selected @endif>Faculty</option>
                                <option value="department" @if ($team->team_type == 'department') selected @endif>Department
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('teams.show', $team) }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
