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
     * Show a list of the user's characters.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('characters.index', compact('user'));
    }

    /**
     * Show the form to create a new character.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->hasRemainingCharacters()) {
            return redirect()->route('characters.index');
        }
        $fighters = Fighter::all();
        return view('characters.create', compact('fighters'));
    }

    /**
     * Save a new character related to the user.
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
        return redirect()->route('characters.index');
    }

    /**
     * Show the given character.
     * 
     * @param  \Character $character
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
     * Delete the given character.
     * 
     * @param  Character $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return redirect()->route('characters.index');
    }

    public function fighterImage($fighter)
    {
        return 'img/characters/'.strtolower($fighter).'.gif';
    }
}
