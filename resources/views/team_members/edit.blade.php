@extends('dashboard.dashboardLayout')
@section('title', 'Edit Room')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Room</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('team-members.update', $teamMember->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="role">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <input id="role" type="text"
                                    class="form-control @error('role') is-invalid @enderror" name="role"
                                    value="{{ old('role', $teamMember->role) }}" required autocomplete="role">

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="staff_id">{{ __('Staff') }}</label>

                            <div class="col-md-6">
                                <select id="staff_id" class="form-control @error('staff_id') is-invalid @enderror"
                                    name="staff_id" required>
                                    <option value="" disabled selected>Select department</option>
                                    @foreach ($staffMembers as $member)
                                        <option value="{{ $member->id }}"
                                            {{ old('staff_id', $teamMember->staff_id) == $member->id ? 'selected' : '' }}>
                                            {{ $member->user->name }} - {{ $member->department->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('staff_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="team_id">{{ __('Team') }}</label>
                            <div class="col-md-6">
                                <select id="team_id" class="form-control @error('team_id') is-invalid @enderror"
                                    name="team_id" required>
                                    <option value="" disabled selected>Select department</option>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}"
                                            {{ old('team_id', $teamMember->team_id) == $team->id ? 'selected' : '' }}>
                                            {{ $team->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('team_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('team-members.index') }}" class="btn btn-secondary">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
