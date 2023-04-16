@extends('dashboard.dashboardLayout')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Room Details</h4>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><strong>Number:</strong></td>
                                <td>{{ $room->number }}</td>
                            </tr>
                            <tr>
                                <td><strong>Location:</strong></td>
                                <td>{{ $room->location }}</td>
                            </tr>
                            <tr>
                                <td><strong>Department:</strong></td>
                                <td>
                                    <a href="/cp/departments/{{ $room->department->id }}">
                                        {{ $room->department->name }}
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('rooms.edit', $room) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('rooms.destroy', $room) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>


                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h3>Devices:</h3>
                            <div class="list-group">
                                @foreach ($room->devices as $device)
                                    <a href="/cp/devices/{{ $device->id }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>{{ $device->title }}</span>
                                                <span
                                                    class="badge badge-pill py-1 px-3 {{ strtolower($device->status) == 'ok' ? 'badge-success' : 'badge-danger' }}">{{ $device->status }}</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
