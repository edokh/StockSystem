@extends('dashboard.dashboardLayout')
@section('title', 'Faculty Details')

@section('content')
    <div class="row  ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Faculty Details</h4>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $faculty->id }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $faculty->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('faculties.edit', $faculty->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('faculties.destroy', $faculty->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>



                <div class="row mx-2 my-4">
                    <div class="col-md-6">
                        <h3>Departments:</h3>
                        <div class="list-group">
                            @foreach ($faculty->departments as $department)
                                <a href="/cp/departments/{{ $department->id }}"
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    {{ $department->name }}

                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
