<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;

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
        return view('characters.create');
    }

    /**
     * Save a new character related to the user.
     * 
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:3|unique:characters',
            'character' => 'required'
        ]);
        auth()->user()->characters()->save(new Character([
            'name' => request('name'),
            'character' => request('character'),
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
}
