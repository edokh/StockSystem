@extends('dashboard.dashboardLayout')
@section('title', 'Department Details')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Department Details</h4>
                </div>
                <div class="card-body">

                    <table class="table">
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $department->id }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $department->name }}</td>
                            </tr>
                    
                            <tr>
                                <td>Faculty</td>
                                <td>{{ $department->faculty->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
