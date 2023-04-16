@extends('dashboard.dashboardLayout')
@section('title', 'Device Details')

@section('content')
    <div class="row  ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Device Details</h4>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $device->id }}</td>
                            </tr>

                            <tr>
                                <td>Name</td>
                                <td>{{ $device->title }}</td>
                            </tr>
                            <tr>
                                <td>Device Type</td>
                                <td>{{ $device->deviceType->name }}</td>
                            </tr>
                            <tr>
                                <td>Room</td>
                                <td>{{ $device->room->id }}-{{ $device->room->location }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ $device->status }}</td>
                            </tr>
                            <tr>
                                <td>Properties About</td>
                                <td>{{ $device->properties_about }}</td>
                            </tr>

                        </tbody>
                    </table>
                    <a href="{{ route('devices.edit', $device->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('devices.destroy', $device->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>


                    <div class=" mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-success text-white">
                                        <h3 class="card-title mb-0">Completed Reports</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="list-group">
                                            @foreach ($device->reports as $report)
                                                @if ($report->status == 'ok')
                                                    <a href="/cp/reports/{{ $report->id }}"
                                                        class="list-group-item list-group-item-action mt-4">
                                                        <h5 class="mb-1">{{ $report->title }}</h5>
                                                        <p class="mb-1">{{ $report->description }}</p>
                                                        <small class="text-muted">{{ $report->created_at }}</small>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-danger text-white">
                                        <h3 class="card-title mb-0">Not Completed Reports</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="list-group">
                                            @foreach ($device->reports as $report)
                                                @if (strtolower($report->status) != 'ok')
                                                    <div class="mt-4 position-relative">
                                                        <a href="/cp/reports/{{ $report->id }}/edit"
                                                            class="text-right mt-2"
                                                            style="position: absolute; top: -0.25rem; z-index: 100;right: .5rem;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                                class="w-6 h-6" style="height: 1.5rem;">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                            </svg>

                                                        </a>
                                                        <a href="/cp/reports/{{ $report->id }}"
                                                            class="list-group-item list-group-item-action">
                                                            <div>
                                                                <h5 class="mb-1">{{ $report->title }}</h5>

                                                            </div>
                                                            <p class="mb-1">{{ $report->description }}</p>
                                                            <small class="text-muted">{{ $report->created_at }}</small>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
