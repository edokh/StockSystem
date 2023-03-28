@extends('dashboard.dashboardLayout')
@section('title', 'Create Faculty')

@section('content')
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Faculty</div>

                <div class="card-body">
                    <form action="{{ route('faculties.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>


                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
