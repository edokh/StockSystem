@extends('dashboard.dashboardLayout')

@section('title', 'Rooms')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Rooms</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('rooms.create') }}" class="btn btn-primary">Create Room</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Location</th>
                                <th>Department</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rooms as $room)
                                <tr>
                                    <td>{{ $room->number }}</td>
                                    <td>{{ $room->location }}</td>
                                    <td>{{ $room->department->name }}</td>
                                    <td>
                                        <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-primary">View</a>
                                        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-secondary">Edit</a>
                                        <form class="d-inline-block" action="{{ route('rooms.destroy', $room->id) }}"
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
