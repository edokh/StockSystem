<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::all();

        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        $users = User::all();
        $departments = Department::all();
        return view('staff.create', compact('users', 'departments'));
    }

    public function store(Request $request)
    {
        $staff = new Staff([
            'user_id' => $request->input('user_id'),
            'department_id' => $request->input('department_id'),
        ]);

        $staff->save();

        return redirect()->route('staff.index');
    }

    public function show(Staff $staff)
    {
        return view('staff.show', compact('staff'));
    }

    public function edit(Staff $staff)
    {

        $users = User::all();
        $departments = Department::all();
        return view('staff.edit', compact('staff', 'users', 'departments'));
    }

    public function update(Request $request, Staff $staff)
    {
        $staff->user_id = $request->input('user_id');
        $staff->department_id = $request->input('department_id');

        $staff->save();

        return redirect()->route('staff.index');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staff.index');
    }
}
