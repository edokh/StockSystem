@extends('dashboard.dashboardLayout')
@section('title', 'Create Department')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Department</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('departments.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }} "
                            style="display: none">
                            <label for="department_id">Department ID</label>

                            <div class="col-md-6">
                                <input id="department_id" type="text" class="form-control" name="department_id"
                                    value="test" required>

                                @if ($errors->has('department_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('faculty_id') ? ' has-error' : '' }}">
                            <label for="faculty_id">Faculty</label>

                            <div class="col-md-6">
                                <select id="faculty_id" class="form-control" name="faculty_id" required>
                                    <option value="">-- Select Faculty --</option>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}"
                                            {{ old('faculty_id') == $faculty->id ? 'selected' : '' }}>
                                            {{ $faculty->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('faculty_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('faculty_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
