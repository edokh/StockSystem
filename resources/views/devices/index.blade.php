@extends('dashboard.dashboardLayout')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Device List</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('devices.create') }}" class="btn btn-primary mb-3">Create Device</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Device Type</th>
                                <th>Room</th>
                                <th>Status</th>
                                <th>Properties</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($devices as $device)
                                <tr>
                                    <td>{{ $device->title }}</td>
                                    <td>{{ $device->deviceType->name }}</td>
                                    <td>{{ $device->room->number }} ({{ $device->room->location }})</td>
                                    <td>{{ $device->status }}</td>
                                    <td>{{ $device->properties_about }}</td>
                                    <td>
                                        <a href="{{ route('devices.show', $device->id) }}" class="btn btn-primary">View</a>
                                        <a href="{{ route('devices.edit', $device->id) }}"
                                            class="btn btn-secondary">Edit</a>
                                        <form action="{{ route('devices.destroy', $device->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this device?')">Delete</button>
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
