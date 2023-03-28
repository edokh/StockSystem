@extends('dashboard.dashboardLayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $staff->user->name }}'s Information</div>

                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $staff->user->name }}</p>
                        <p><strong>Email:</strong> {{ $staff->user->email }}</p>
                        <p><strong>Department:</strong> {{ $staff->department->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
