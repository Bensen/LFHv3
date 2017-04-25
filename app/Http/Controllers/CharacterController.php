<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Character;
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
        auth()->user()->characters()->save(new Character([
            'team_id' => NULL,
            'role' => 'None',
            'name' => request('name'),
            'fighter' => request('fighter'),
            'image' => $fighter->image,
            'level' => 1,
            'experience' => 0,
            'fame' => rand(0, 100),
            'health' => $fighter->health,
            'maxHealth' => $fighter->health,
            'primary' => $fighter->primary,
            'secondary' => $fighter->secondary,
        ]));
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
        return view('characters.show', compact('character'));
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
}
