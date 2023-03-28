@extends('dashboard.dashboardLayout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Staff') }}</h4>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-end mb-2">
                        <a href="{{ route('staff.create') }}" class="btn btn-primary mb-3">{{ __('Create Staff') }}</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('User Name') }}</th>
                                <th>{{ __('Department') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staff as $staff)
                                <tr>
                                    <td>{{ $staff->id }}</td>
                                    <td>{{ $staff->user->name }}</td>
                                    <td>{{ $staff->department->name }}</td>

                                    <td>
                                        <a href="{{ route('staff.show', $staff) }}" class="btn btn-primary">View</a>
                                        <a href="{{ route('staff.edit', $staff) }}" <a
                                            href="{{ route('staff.edit', $staff) }}" class="btn btn-secondary">Edit</a>
                                        <form class="d-inline-block" action="{{ route('staff.destroy', $staff) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
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
