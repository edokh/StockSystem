@extends('dashboard.dashboardLayout')
@section('title', 'Create Report')

@section('content')
    <div class="row  ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> {{ __('Create Report') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('reports.store') }}">
                        @csrf


                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text"
                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                    value="{{ old('title') }}" required autocomplete="title">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea name="description" id="description" rows="6"
                                    class="form-control @error('description') is-invalid @enderror" name="description"></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="device_id">{{ __('Device') }}</label>

                            <div class="col-md-6">
                                <select id="device_id" class="form-control @error('device_id') is-invalid @enderror"
                                    name="device_id" required>
                                    <option value="" disabled selected>Select device</option>
                                    @foreach ($devices as $device)
                                        <option value="{{ $device->id }}">{{ $device->title }}</option>
                                    @endforeach
                                </select>

                                @error('device_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label for="user_id">{{ __('User') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <select id="user_id" class="form-control @error('user_id') is-invalid @enderror"--}}
{{--                                    name="user_id" required>--}}
{{--                                    <option value="" disabled selected>Select user</option>--}}
{{--                                    @foreach ($users as $user)--}}
{{--                                        <option value="{{ $user->id }}">{{ $user->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}

{{--                                @error('user_id')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}


                        <div class="form-group">
                            <label for="status">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <input id="status" type="text"
                                    class="form-control @error('status') is-invalid @enderror" name="status"
                                    value="{{ old('status') }}" required autocomplete="status">

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="priority">{{ __('Priority') }}</label>

                            <div class="col-md-6">
                                <select id="priority" class="form-control @error('priority') is-invalid @enderror"
                                    name="priority" required>
                                    <option value="" disabled selected>Select priority</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>

                                @error('priority')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('reports.index') }}" class="btn btn-secondary">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
