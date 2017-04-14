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
        return view('character.index', compact('user'));
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
        return view('character.create', compact('fighters'));
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
            'name' => 'required|min:3|max:25|alpha_num|not_in:'.Rule::notIn($fighters).'unique:characters',
            'fighter' => 'required|in:'.Rule::in($fighters),
        ]);
        auth()->user()->characters()->save(new Character([
            'name' => request('name'),
            'fighter' => request('fighter'),
            'image' => $this->fighterImage(request('fighter')),
            'level' => 1,
            'experience' => 0,
            'health' => 500,
            'primary' => 'str',
            'secondary' => 'rage',
        ]));
        return redirect()->route('character.index');
    }

    /**
     * Show the given character.
     * 
     * @param  \Character $character
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character)
    {
        return view('character.show', compact('character'));
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
     * Delete the given Character.
     * 
     * @param  Character $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return redirect()->route('character.index');
    }

    public function fighterImage($fighter)
    {
        return 'img/characters/'.strtolower($fighter).'.gif';
    }
}
