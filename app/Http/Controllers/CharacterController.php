<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Character;
use App\Team;
use App\Fighter;

class CharacterController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a list of the User's Characters.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('characters.index', compact('user'));
    }

    /**
     * Show the form to create a new Character.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->hasRemainingCharacters()) {
            return redirect()->route('character.index');
        }
        $fighters = Fighter::all();
        return view('characters.create', compact('fighters'));
    }

    /**
     * Store a new Character related to the user.
     * 
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $fighters = Fighter::pluck('name')->toArray();
        $this->validate(request(), [
            'name' => 'required|min:3|max:25|not_in:'.Rule::notIn($fighters).'unique:characters',
            'fighter' => 'required|in:'.Rule::in($fighters),
        ]);
        $fighter = Fighter::where('name', request('fighter'))->first();

        $character = new Character;
        $character->team_id = NULL;
        $character->role = 'None';
        $character->name = request('name');
        $character->fighter = request('fighter');
        $character->image = $fighter->image;
        $character->level = 1;
        $character->experience = 0;
        $character->fame = rand(0, 100);
        $character->health = $fighter->health;
        $character->damage = 0;
        $character->primary = $fighter->primary;
        $character->secondary = $fighter->secondary;
        auth()->user()->characters()->save($character);
        
        return redirect()->route('character.index');
    }

    /**
     * Display the specified Character.
     * 
     * @param  \App\Character $character
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character)
    {
        if ($character->hasTeam()) {
            $team = Team::find($character->team_id);
        }
        return view('characters.show', compact('character', 'team'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Delete the specified Character.
     * 
     * @param  \App\Character $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return redirect()->route('character.index');
    }

    /**
     * Register a Character into the Session.
     * 
     * @param  \App\Character $character
     * @return \Illuminate\Http\Response
     */
    public function play(Character $character)
    {
        if (session('character')) {
            session()->forget('character');
        }
        session(['character' => $character->id]);
        return redirect()->route('character.show', $character->id);
    }

    public function addExp(Character $character)
    {
        $character->experience += 100;
        $character->save();
        \App\Game\Level::up($character);
        return redirect()->back();
    }
}
