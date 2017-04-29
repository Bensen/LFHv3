<?php

namespace App\Http\Controllers;

use App\Team;
use App\Character;
use Illuminate\Http\Request;
use App\Traits\TeamTrait;

class TeamController extends Controller
{
    use TeamTrait;

    function __construct()
    {
        $this->middleware(['auth', 'character']);
    }

    /**
     * Redirect to team.create or team.show.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $character = Character::find(session('character'));
        // Redirect if the Character has no Team.
        if (is_null($character->team_id)) {
            return redirect()->route('team.create');
        }
        $team = Team::find($character->team_id);
        return redirect()->route('team.show', $team->id);
    }

    /**
     * Show the form for creating a new Team.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $character = Character::find(session('character'));
        if (isset($character->team_id)) {
            return redirect()->route('team.index');
        }
        $emblems = \App\Emblem::all();
        $colors = \App\Fighter::pluck('name');
        return view('teams.create', compact('emblems', 'colors'));
    }

    /**
     * Store a new Team.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $emblems = Emblem::pluck('name')->toArray();
        $colors = Fighter::pluck('name')->toArray();
        $this->validate(request(), [
            'name' => 'required|min:3|max:25|unique:teams',
            'emblem' => 'required|in:'.Rule::in($emblems),
            'color' => 'required|in:'.Rule::in($colors),
        ]);
        $team = new Team;
        $team->name = request('name');
        $team->emblem = request('emblem');
        $team->color = request('color');
        $team->fame = 0;
        $team->save();

        $character = Character::find(session('character'));
        $character->team()->associate($team);
        $character->role = 'Leader';
        $character->save();

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
        $character = Character::find(session('character'));
        $characters = $team->characters()->where('role', '!=', 'Applicant')->orderBy('fame', 'desc')->get();
        $applicants = $team->characters()->where('role', 'Applicant')->get();
        $this->updateFame($team, $characters);
        return view('teams.show', compact('team', 'characters', 'character', 'applicants'));
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
     * Delete the specified Team.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $this->dismissMembers($team);
        $team->delete($team);
        return redirect()->route('team.index');
    }

    public function apply(Team $team)
    {
        if ($team->characters->count() == $team->getMaxCharacters) {
            return redirect()->back()->with('status', 'Das Team ist bereits voll.');
        }
        $character = Character::find(session('character'));
        $character->team()->associate($team);
        $character->role = 'Applicant';
        $character->save();
        return redirect()->back();
    }

    public function kick(Team $team)
    {
        //
        return redirect()->back();
    }

    public function leave(Team $team)
    {
        $character = Character::find(session('character'));
        $character->team()->dissociate($team);
        $character->role = 'None';
        $character->save();
        return redirect()->back();
    }

    public function accept(Team $team, Character $applicant)
    {
        $applicant->role = 'Member';
        $applicant->save();
        return redirect()->back();
    }

    public function reject(Team $team, Character $applicant)
    {
        $applicant->team()->dissociate($team);
        $applicant->role = 'None';
        $applicant->save();
        return redirect()->back();
    }
}
