<?php

namespace App\Http\Controllers;

use App\Models\DeviceType;
use Illuminate\Http\Request;

class DeviceTypeController extends Controller
{
    public function index()
    {
        $deviceTypes = DeviceType::all();
        return view('device_types.index', compact('deviceTypes'));
    }

    public function create()
    {
        return view('device_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $deviceType = new DeviceType([
            'name' => $request->input('name')
        ]);
        $deviceType->save();

        return redirect()->route('device-types.index')->with('success', 'Device Type created successfully');
    }

    public function show(DeviceType $deviceType)
    {
        return view('device_types.show', compact('deviceType'));
    }

    public function edit(DeviceType $deviceType)
    {
        // return view('device_types.edit', compact('deviceType'));
        return view('device_types.edit', ['device_type' => $deviceType]);
    }

    public function update(Request $request, DeviceType $deviceType)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $deviceType->update([
            'name' => $request->input('name')
        ]);

        return redirect()->route('device-types.index')->with('success', 'Device Type updated successfully');
    }

    public function destroy(DeviceType $deviceType)
    {
        $deviceType->delete();
        return redirect()->route('device-types.index')->with('success', 'Device Type deleted successfully');
    }
}
