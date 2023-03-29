@extends('dashboard.dashboardLayout')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Report Details</h4>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><strong>Title:</strong></td>
                                <td>{{ $report->title }}</td>
                            </tr>
                            <tr>
                                <td><strong>Description:</strong></td>
                                <td>{{ $report->description }}</td>
                            </tr>
                            <tr>
                                <td><strong>Device:</strong></td>
                                <td>{{ $report->device->title }}</td>
                            </tr>
                            <tr>
                                <td><strong>User:</strong></td>
                                <td>{{ $report->user->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td>{{ $report->status }}</td>
                            </tr>
                            <tr>
                                <td><strong>Priority:</strong></td>
                                <td>{{ $report->priority }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('reports.edit', $report) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('reports.destroy', $report) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
