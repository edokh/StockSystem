@extends('dashboard.dashboardLayout')
@section('title', 'Create Staff')

@section('content')
    <div class="row  ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Create New Staff') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('staff.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="user_id">{{ __('User') }}</label>

                            <select id="user_id" class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                                required>
                                <option value="" disabled selected>Select user</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="department_id">{{ __('Department') }}</label>

                            <select id="department_id" class="form-control @error('department_id') is-invalid @enderror"
                                name="department_id" required>
                                <option value="" disabled selected>Select department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"
                                        {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}</option>
                                @endforeach
                            </select>

                            @error('department_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Create') }}
                        </button>
                        <a href="{{ route('staff.index') }}" class="btn btn-secondary">
                            {{ __('Cancel') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
