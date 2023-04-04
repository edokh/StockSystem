<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\DeviceType;
use App\Models\Room;

class DeviceController extends Controller
{
    public function index()
    {
        $query = Device::query()->with('deviceType', 'room');

        if (auth()->user()->can('staff'))
        {
            $query->leftJoin('rooms', 'rooms.id', '=', 'devices.room_id')
                ->leftJoin('staff', 'staff.department_id', '=', 'rooms.department_id')
                ->where('staff.user_id', auth()->user()->id);
        }
        $devices= $query->get();
        return view('devices.index', compact('devices'));
    }

    public function create()
    {
        $deviceTypes = DeviceType::all();
        $rooms = Room::all();
        return view('devices.create', compact('deviceTypes', 'rooms'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'device_type_id' => 'required',
            'room_id' => 'required',
            'status' => 'required|max:50',
            'properties_about' => 'required|max:255',
        ]);

        $device = Device::create($validatedData);

        return redirect()->route('devices.index')->with('success', 'Device created successfully.');
    }

    public function edit(Device $device)
    {
        $deviceTypes = DeviceType::all();
        $rooms = Room::all();
        return view('devices.edit', compact('device', 'deviceTypes', 'rooms'));
    }

    public function update(Request $request, Device $device)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'device_type_id' => 'required',
            'room_id' => 'required',
            'status' => 'required|max:50',
            'properties_about' => 'required|max:255',
        ]);

        $device->update($validatedData);

        return redirect()->route('devices.index')->with('success', 'Device updated successfully.');
    }

    public function show(Device $device)
    {
        return view('devices.show', compact('device'));
    }

    public function destroy(Device $device)
    {
        $device->delete();

        return redirect()->route('devices.index')->with('success', 'Device deleted successfully.');
    }
}
