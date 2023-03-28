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
            </div>
        </div>
    </div>
@endsection
