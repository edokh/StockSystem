@extends('dashboard.dashboardLayout')
@section('title', 'Edit Device Type')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Edit Device Type') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('device-types.update', $device_type->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group  ">
                            <label for="name">{{ __('Name') }}</label>

                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ old('name', $device_type->name) }}" required autocomplete="name" autofocus>


                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('device-types.show', $device_type) }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
