<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function ranking()
    {
        $characters = \App\Character::all();
        return view('pages.ranking', compact('characters'));
    }
}
