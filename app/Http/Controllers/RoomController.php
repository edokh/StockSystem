<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('department')->get();
        return view('rooms.index', compact('rooms'));
    }
    public function show($id)
    {
        $room = Room::find($id);
        return view('rooms.show', compact('room'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('rooms.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'number' => 'required|integer',
            'location' => 'required|string|max:255',
            'department_id' => 'required|integer',
        ]);

        Room::create($validatedData);

        return redirect()->route('rooms.index')
            ->with('success', 'Room created successfully.');
    }

    public function edit(Room $room)
    {
        $departments = Department::all();
        return view('rooms.edit', compact('room', 'departments'));
    }

    public function update(Request $request, Room $room)
    {
        $validatedData = $request->validate([
            'number' => 'required|integer',
            'location' => 'required|string|max:255',
            'department_id' => 'required|integer',
        ]);

        $room->update($validatedData);

        return redirect()->route('rooms.index')
            ->with('success', 'Room updated successfully');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('rooms.index')
            ->with('success', 'Room deleted successfully');
    }
}
