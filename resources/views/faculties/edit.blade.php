@extends('dashboard.dashboardLayout')
@section('title', 'Edit Faculty')

@section('content')
    <div class="row  ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Faculty</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('faculties.update', $faculty->id) }}">
                        @csrf
                        @method('PUT')


                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name', $faculty->name) }}" required autocomplete="name">

                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('faculties.show', $faculty) }}" class="btn btn-secondary">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
