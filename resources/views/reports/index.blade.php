@extends('dashboard.dashboardLayout')

@section('title', 'Reports')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Reports</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('reports.create') }}" class="btn btn-primary">Create Report</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Device</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Priority</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->title }}</td>
                                    <td>{{ $report->device->title }}</td>
                                    <td>{{ $report->user->name }}</td>
                                    <td>{{ $report->status }}</td>
                                    <td>{{ $report->priority }}</td>
                                    <td>
                                        <a href="{{ route('reports.show', $report->id) }}" class="btn btn-primary">View</a>
                                        <a href="{{ route('reports.edit', $report->id) }}"
                                            class="btn btn-secondary">Edit</a>
                                        <form class="d-inline-block" action="{{ route('reports.destroy', $report->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"
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
