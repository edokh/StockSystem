@extends('dashboard.dashboardLayout')
@section('title', 'Edit Room')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Room</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('rooms.update', $room->id) }}">
                        @csrf
                        @method('PUT')

                        <div class=" form-group">
                            <label for="number">Number</label>

                            <div class="col-md-6">
                                <input id="number" type="text"
                                    class="form-control @error('number') is-invalid @enderror" name="number"
                                    value="{{ old('number', $room->number) }}" required autocomplete="number" autofocus>

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" form-group">
                            <label for="location">Location</label>

                            <div class="col-md-6">
                                <input id="location" type="text"
                                    class="form-control @error('location') is-invalid @enderror" name="location"
                                    value="{{ old('location', $room->location) }}" required autocomplete="location">

                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" form-group">
                            <label for="department_id">Department</label>

                            <div class="col-md-6">
                                <select name="department_id" id="department_id"
                                    class="form-control @error('department_id') is-invalid @enderror" required>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"
                                            {{ old('department_id', $room->department_id) == $department->id ? 'selected' : '' }}>
                                            {{ $department->name }}</option>
                                    @endforeach
                                </select>

                                @error('department_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('rooms.show', $room) }}" class="btn btn-secondary">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
