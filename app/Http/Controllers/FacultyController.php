<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::all();
        return view('faculties.index', ['faculties' => $faculties]);
    }

    public function create()
    {
        return view('faculties.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $faculty = new Faculty;
        $faculty->name = $request->name;
        $faculty->save();

        return redirect()->route('faculties.index')->with('success', 'Faculty created successfully.');
    }

    public function show(Faculty $faculty)
    {
        return view('faculties.show', ['faculty' => $faculty]);
    }

    public function edit(Faculty $faculty)
    {
        return view('faculties.edit', ['faculty' => $faculty]);
    }

    public function update(Request $request, Faculty $faculty)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $faculty->name = $request->name;
        $faculty->save();

        return redirect()->route('faculties.show', $faculty)->with('success', 'Faculty updated successfully.');
    }

    public function destroy(Faculty $faculty)
    {
        $faculty->delete();

        return redirect()->route('faculties.index')->with('success', 'Faculty deleted successfully.');
    }
}
