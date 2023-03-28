@extends('dashboard.dashboardLayout')
@section('title', 'Device Types')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Device Types</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('device-types.create') }}" class="btn btn-primary mb-3">Create Device Type</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deviceTypes as $deviceType)
                                <tr>
                                    <td>{{ $deviceType->id }}</td>
                                    <td>{{ $deviceType->name }}</td>
                                    <td>
                                        <a href="{{ route('device-types.show', ['device_type' => $deviceType->id]) }}"
                                            class="btn   btn-primary">View</a>
                                        <a href="{{ route('device-types.edit', ['device_type' => $deviceType->id]) }}"
                                            class="btn   btn-secondary">Edit</a>
                                        <form
                                            action="{{ route('device-types.destroy', ['device_type' => $deviceType->id]) }}"
                                            method="POST" class="d-inline">
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
