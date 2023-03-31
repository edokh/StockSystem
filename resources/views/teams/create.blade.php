@extends('dashboard.dashboardLayout')
@section('title', 'Create Team')
@section('content')
    <div class="row  ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Create Team') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('teams.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Team Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="team_type">Team Type</label>
                                <select class="form-control" id="team_type" name="team_type" required>
                                    <option value="">-- Select Team Type --</option>
                                    <option value="faculty">Faculty</option>
                                    <option value="department">Department</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Team') }}
                                </button>
                                <a href="{{ route('teams.index') }}" class="btn btn-secondary">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
