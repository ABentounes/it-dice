<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavController extends Controller
{
    public function show()
    {
        return view('home');
    }

    public function form()
    {
        return view('settings');
    }

    public function credits()
    {
        return view('credits');
    }
    public function startGame()
    {
        return view('game');
    }
}
