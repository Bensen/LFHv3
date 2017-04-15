<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the Team where a User is member of.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->hasTeam()) {
            return redirect()->route('team.create');
        }
        $team = auth()->user()->team()->first();
        $users = \App\User::where('team_id', $team->id)->get();
        dd($users);
        return view('team.index', compact('team', 'users'));
    }

    /**
     * Show the form for creating a new Team.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->hasTeam()) {
            return redirect()->route('team.index');
        }
        return view('team.create');
    }

    /**
     * Store a new Team.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:3|max:25|alpha_num|unique:teams',
        ]);
        $team = new Team([
            'name' => request('name'),
            'fame' => 0,
        ]);
        $team->save();
        auth()->user()->team()->associate($team)->save();
        return redirect()->route('team.index');
    }

    /**
     * Display the specified Team.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('team.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }
}
