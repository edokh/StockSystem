@extends('dashboard.dashboardLayout')
@section('title', 'Create Room')

@section('content')
    <div class="row  ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> {{ __('Create Room') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('rooms.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="number">{{ __('Room Number') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="text"
                                    class="form-control @error('number') is-invalid @enderror" name="number"
                                    value="{{ old('number') }}" required autocomplete="number" autofocus>

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="location">{{ __('Location') }}</label>

                            <div class="col-md-6">
                                <input id="location" type="text"
                                    class="form-control @error('location') is-invalid @enderror" name="location"
                                    value="{{ old('location') }}" required autocomplete="location">

                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="department_id">{{ __('Department') }}</label>

                            <div class="col-md-6">
                                <select id="department_id" class="form-control @error('department_id') is-invalid @enderror"
                                    name="department_id" required>
                                    <option value="" disabled selected>Select department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>

                                @error('department_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
