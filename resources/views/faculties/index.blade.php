@extends('dashboard.dashboardLayout')
@section('title', 'Faculties')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Faculties</h4>
                </div>

                <div class="card-body">
                    <a href="{{ route('faculties.create') }}" class="btn btn-primary mb-3">Create Faculty</a>


                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faculties as $faculty)
                                <tr>
                                    <td>{{ $faculty->id }}</td>
                                    <td>{{ $faculty->name }}</td>
                                    <td>
                                        <a href="{{ route('faculties.show', $faculty->id) }}" class="btn btn-primary">View</a>
                                        <a href="{{ route('faculties.edit', $faculty->id) }}"
                                            class="btn btn-secondary">Edit</a>
                                        <form class="d-inline-block" action="{{ route('faculties.destroy', $faculty->id) }}"
                                            method="POST" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
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
