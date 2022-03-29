<?php

namespace Modules\Team\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Team\Entities\Team;
use Modules\Team\Http\Requests\TeamRequest;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $teams = Team::all();
        return view('team::index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('team::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param TeamRequest $request
     * @return RedirectResponse
     */
    public function store(TeamRequest $request)
    {
        try {
            $validateData = $request->all();
            if ($request->hasFile('image')) {
                $validateData['image'] = $request->image->store('public/image');
            }
            Team::create($validateData);
            return redirect()->route('team.create')->with('success', 'Team Created Successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Team Cannot Be Create');
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('team::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Team $team
     * @return Renderable
     */
    public function edit(Team $team)
    {
        return view('team::edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     * @param TeamRequest $request
     * @param Team $team
     * @return RedirectResponse
     */
    public function update(TeamRequest $request, Team $team)
    {
        try {
            $validateData = $request->all();
            if ($request->hasFile('image')) {
                $validateData['image'] = $request->image->store('public/image');
            }
            $team->update($validateData);
            return redirect()->route('team.index')->with('success', 'Team Updated Successfully');
        } catch (Exception $exception) {
            return back()->with('error', 'Team Cannot be updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param Team $team
     * @return RedirectResponse
     */
    public function destroy(Team $team)
    {
        try {
            DB::beginTransaction();
            $team->delete();
            DB::commit();
            return redirect()->route('team.index')->with('success', 'Team Deleted Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('error', 'Cannot Delete Team Something Went Wrong');
        }
    }
}
