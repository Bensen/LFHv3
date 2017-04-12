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

    public function index()
    {
        $user = auth()->user();
        return view('characters.index', compact('user'));
    }

    public function create()
    {
        return view('characters.create');
    }

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
        return redirect('/characters');
    }
}
