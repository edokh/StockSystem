@extends('dashboard.dashboardLayout')
@section('title', 'Department Details')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Department Details</h4>
                </div>
                <div class="card-body">

                    <table class="table">
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $department->id }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $department->name }}</td>
                            </tr>

                            <tr>
                                <td>Faculty</td>
                                <td><a
                                        href="/cp/faculties/{{ $department->faculty->id }}">{{ $department->faculty->name }}</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>


                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h3>Rooms:</h3>
                            <div class="list-group">
                                @foreach ($department->rooms as $room)
                                    <a href="/cp/rooms/{{ $room->id }}"
                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        {{ $room->number }} / {{ $room->location }}

                                        <span
                                            class="badge bg-primary rounded-pill text-white">{{ $room->devices->count() }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3>Staff:</h3>
                            <div class="list-group">
                                @foreach ($department->staff as $member)
                                    <div class="list-group-item">{{ $member->user->name }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
