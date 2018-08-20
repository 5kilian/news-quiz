<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LeaderBoardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function leaderboard()
    {
        return User::orderBy('score', 'desc')->select('name', 'score')->get();
    }
}
