@extends('dashboard.dashboardLayout')
@section('title', 'Create Team')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Team') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('teams.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Team Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="teamable_type"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Team Type') }}</label>

                                <div class="col-md-6">
                                    <select id="teamable_type"
                                        class="form-control @error('teamable_type') is-invalid @enderror"
                                        name="teamable_type" required>
                                        <option value="App\Models\Department">{{ __('Department') }}</option>
                                        <option value="App\Models\Project">{{ __('Project') }}</option>
                                    </select>

                                    @error('teamable_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="teamable_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Teamable ID') }}</label>

                                <div class="col-md-6">
                                    <input id="teamable_id" type="text"
                                        class="form-control @error('teamable_id') is-invalid @enderror" name="teamable_id"
                                        value="{{ old('teamable_id') }}" required>

                                    @error('teamable_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create Team') }}
                                    </button>
                                    <a href="{{ route('teams.index') }}" class="btn btn-secondary">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
