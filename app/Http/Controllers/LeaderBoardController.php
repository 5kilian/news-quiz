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
        return  User::orderBy('score', 'desc')
                    ->select('name', 'score')
                    ->get();
    }

    /**
     * return score from authenticated user.
     * @return int score
     */
    public function points()
    {
        return  Auth::user()
                    ->score;
    }

    /**
     * return rank from authenticated user.
     * @return int rank
     */
    public function rank()
    {
        $users =    User::orderBy('score', 'desc')
                        ->get();
     
        foreach($users as $index => $user)
        {
            if($user->id == Auth::id())
            {
                return $index + 1;
            }
        }
    }
}
