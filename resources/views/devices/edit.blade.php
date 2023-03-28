@extends('dashboard.dashboardLayout')
@section('title', 'Edit Device')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>{{ __('Edit Device') }}</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('devices.update', ['device' => $device->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{ old('title', $device->title) }}" required autocomplete="title"
                                autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="device_type_id">{{ __('Device Type') }}</label>

                        <div class="col-md-6">
                            <select id="device_type_id" class="form-control @error('device_type_id') is-invalid @enderror"
                                name="device_type_id" required>
                                <option value="">-- Select Device Type --</option>
                                @foreach ($deviceTypes as $deviceType)
                                    <option value="{{ $deviceType->id }}" @if ($deviceType->id == old('device_type_id', $device->device_type_id)) selected @endif>
                                        {{ $deviceType->name }}</option>
                                @endforeach
                            </select>

                            @error('device_type_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room_id">{{ __('Room') }}</label>

                        <div class="col-md-6">
                            <select id="room_id" class="form-control @error('room_id') is-invalid @enderror"
                                name="room_id" required>
                                <option value="">-- Select Room --</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}" @if ($room->id == old('room_id', $device->room_id)) selected @endif>
                                        {{ $room->location }}
                                    </option>
                                @endforeach
                            </select>

                            @error('room_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status">{{ __('Status') }}</label>

                        <div class="col-md-6">
                            <input id="status" type="text" class="form-control @error('status') is-invalid @enderror"
                                name="status" value="{{ old('title', $device->status) }}" required>

                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="properties_about">{{ __('Properties About') }}</label>

                        <div class="col-md-6">
                            <textarea name="properties_about" id="properties_about" rows="10"
                                class="form-control @error('properties_about') is-invalid @enderror" name="properties_about">
                                {{ old('title', $device->properties_about) }}
                            </textarea>

                            @error('properties_about')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('devices.show', $device) }}" class="btn btn-secondary">Cancel</a>

                </form>
            </div>
        </div>
    </div>
@endsection
