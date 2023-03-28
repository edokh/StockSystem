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
                                <td>{{ $room->department->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('rooms.edit', $room) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('rooms.destroy', $room) }}" method="POST" style="display: inline-block;">
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
