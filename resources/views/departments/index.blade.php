@extends('dashboard.dashboardLayout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Departments </h4>
                </div>

                <div class="card-body">
                    <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Create</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Department ID</th>
                                <th>Faculty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                                <tr>
                                    <td>{{ $department->id }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td>{{ $department->department_id }}</td>
                                    <td>{{ $department->faculty->name }}</td>
                                    <td>
                                        <a href="{{ route('departments.show', $department->id) }}"
                                            class="btn btn-primary">View</a>
                                        <a href="{{ route('departments.edit', $department->id) }}"
                                            class="btn btn-secondary">Edit</a>
                                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
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
