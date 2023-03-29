<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\Staff;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TeamMemberController extends Controller
{
    public function index()
    {
        // $teamMembers = TeamMember::with('staff', 'team')->join('users', 'users.id')->get();
        $teamMembers = DB::table('team_members')
            ->join('teams', 'teams.id', 'team_members.team_id')
            ->join('staff', 'staff.id', 'team_members.staff_id')
            ->join('users', 'users.id', 'staff.user_id')
            ->join('departments', 'departments.id', 'staff.department_id')
            ->select('team_members.id', 'team_members.role', 'team_members.team_id', 'team_members.staff_id', 'teams.name as team', 'users.name as user', 'departments.name as department')
            ->get();

        return view('team_members.index', compact('teamMembers'));
    }

    public function create()
    {
        $staffMembers = Staff::with('user')->with('department')->get();
        $teams = Team::all();
        return view('team_members.create', compact('staffMembers', 'teams'));
    }

    public function store(Request $request)
    {
        Log::info($request);
        $member = TeamMember::create($request->all());
        // $validatedData = $request->validate([
        //     'staff_id' => 'required|exists:staff,id',
        //     'team_id' => 'required|exists:teams,id',
        //     'role' => 'required'
        // ]);

        // $teamMember = new TeamMember();
        // $teamMember->staff_id = $request->staff_id;
        // $teamMember->team_id = $request->team_id;
        // $teamMember->role = $request->role;
        // // $teamMember->team()->create([
        // //     'name'
        // // ]) = $request->role;
        // $teamMember->save();

        return redirect()->route('team-members.index')->with('success', 'Team member created successfully.');
    }

    public function show(TeamMember $teamMember)
    {
        $teamMember->load('staff', 'team');
        return view('team-members.show', compact('teamMember'));
    }

    public function edit(TeamMember $teamMember)
    {
        // $staffMembers = Staff::all();
        // $teams = Team::all();

        $staffMembers = Staff::with('user')->with('department')->get();
        $teams = Team::all();
        return view('team_members.edit', compact('teamMember', 'staffMembers', 'teams'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $validatedData = $request->validate([
            'staff_id' => 'required|exists:staff,id',
            'team_id' => 'required|exists:teams,id',
            'role' => 'required'
        ]);

        $teamMember->staff_id = $request->staff_id;
        $teamMember->team_id = $request->team_id;
        $teamMember->role = $request->role;
        $teamMember->save();

        return redirect()->route('team-members.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();

        return redirect()->route('team-members.index')->with('success', 'Team member deleted successfully.');
    }
}
