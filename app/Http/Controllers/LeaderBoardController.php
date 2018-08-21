<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

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

    public function points()
    {
        return Auth::user()->score;
    }

    public function rang()
    {
        $users = User::orderBy('score', 'desc')->get();
     
        foreach($users as $index => $user)
        {
            if($user->id == Auth::id())
            {
                return $index + 1;
            }
        }
    }
}
