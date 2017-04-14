<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function __construct()
    {
        $this->middleware('auth', ['except' => ['home']]);
    }

    public function home()
    {
        return view('pages.home');
    }

    public function ranking()
    {
        $characters = \App\Character::orderBy('fame', 'desc')->get();
        return view('pages.ranking', compact('characters'));
    }
}
