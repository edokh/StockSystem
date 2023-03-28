@extends('dashboard.dashboardLayout')
@section('title', 'Deveice Type Details')

@section('content')
    <div class="row  ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Device Type Details</h4>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $deviceType->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $deviceType->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('device-types.edit', $deviceType) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('device-types.destroy', $deviceType) }}" method="POST"
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
