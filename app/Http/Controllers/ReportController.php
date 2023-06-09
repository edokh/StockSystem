<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        if (auth()->user()->canAny(['admin','maintainer'])) {
            $reports = Report::with('device', 'user')->orderBy('created_at', 'desc')->get();
        } else {
            $reports = Report::with('device', 'user')->where('user_id', auth()->user()->id)->get();
        }
        return view('reports.index', compact('reports'));
    }

    public function show($id)
    {
        $report = Report::find($id);
        return view('reports.show', compact('report'));
    }

    public function create()
    {

        $query = Device::query();

        if (auth()->user()->can('staff'))
        {
            $query->leftJoin('rooms', 'rooms.id', '=', 'devices.room_id')
                ->leftJoin('staff', 'staff.department_id', '=', 'rooms.department_id')
                ->where('staff.user_id', auth()->user()->id);
        }

        $devices = $query->get();
        $users = User::all();

        return view('reports.create', compact('devices', 'users'));
    }

    public function store(Request $request)
    {

       $request->merge(['user_id' => auth()->user()->id]);
        Report::create($request->all());

        return redirect()->route('reports.index')
            ->with('success', 'Report created successfully.');
    }


    public function edit(Report $report)
    {

        $devices = Device::all();
        $users = User::all();
        return view('reports.edit', compact('report', 'devices', 'users'));
    }

    public function update(Request $request, Report $report)
    {
        $request->merge(['user_id' => auth()->user()->id]);
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $report->update($request->all());

        return redirect()->route('reports.index')
            ->with('success', 'Room updated successfully');
    }

    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->route('reports.index')
            ->with('success', 'Report deleted successfully');
    }
}
