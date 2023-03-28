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
                                <td>{{ $device->id }}</td>
                            </tr>

                            <tr>
                                <td>Name</td>
                                <td>{{ $device->title }}</td>
                            </tr>
                            <tr>
                                <td>Device Type</td>
                                <td>{{ $device->deviceType->name }}</td>
                            </tr>
                            <tr>
                                <td>Room</td>
                                <td>{{ $device->room->id }}-{{ $device->room->location }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ $device->status }}</td>
                            </tr>
                            <tr>
                                <td>Properties About</td>
                                <td>{{ $device->properties_about }}</td>
                            </tr>

                        </tbody>
                    </table>
                    <a href="{{ route('devices.edit', $device->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('devices.destroy', $device->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
