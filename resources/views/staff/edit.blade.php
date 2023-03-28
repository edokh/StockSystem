@extends('dashboard.dashboardLayout')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card-header">
                <h2>Edit Staff</h2>
            </div>

            <div class="card-body">
                <form action="{{ route('staff.update', $staff->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="user_id">User:</label>
                        <select name="user_id" id="user_id" class="form-control">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $staff->user_id ? 'selected' : '' }}>
                                    {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="department_id">Department:</label>
                        <select name="department_id" id="department_id" class="form-control">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ $department->id == $staff->department_id ? 'selected' : '' }}>{{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
