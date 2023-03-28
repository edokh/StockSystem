@extends('dashboard.dashboardLayout')
@section('title', 'Edit Department')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Department</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('departments.update', $department->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $department->name }}" required>
                        </div>
                        <div class="form-group" style="display: none">
                            <label for="department_id">Department:</label>
                            <input type="text" class="form-control" id="department_id" name="department_id"
                                value="{{ $department->department_id }}" required>
                        </div>
                        <div class="form-group">
                            <label for="faculty_id">Faculty:</label>
                            <select class="form-control" id="faculty_id" name="faculty_id" required>
                                @foreach ($faculties as $faculty)
                                    <option value="{{ $faculty->id }}"
                                        {{ $department->faculty_id == $faculty->id ? 'selected' : '' }}>{{ $faculty->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('departments.show', $department->id) }}" class="btn btn-secondary">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
