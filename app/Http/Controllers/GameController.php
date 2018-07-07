<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GameController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function answerquestion(Request $request)
    {
        //

        $Rightanswer = null;
        dd($request->user());
        $Score = $request->user()->score;
        $Userid = $request->user()->uid;


        if($request->has('isTrue'))
        {
            //Fake or no Fake

            $Answer = Answer::where('AID',$request->input('AID'))->firstOrFail();
            $Quelle = $Answer->question->source;

            if($Answer->istrue == true)
            {
                //return "Klasse, die Antwort war richtig!";
                $Rightanswer = true;
                $Score =+ 20;
            }
            else
            {
                $Rightanswer = false;
                $Score =- 10;

            }
            $User = User::where('uid', $Userid);
            $User->score = $Score;
            $User->save();
            return response()->json(['Result' => $Rightanswer, 'Score' => $Score, 'Text' => $Quelle->Text, 'Video' => $Quelle->Video]);




        }
        else if($request->has('AID'))
        {
            $Answer = Answer::where('AID',$request->input('AID'))->firstOrFail();
            //$model = App\Flight::where('legs', '>', 100)->firstOrFail();
            //dd($Answer);
            if($Answer->istrue == true)
            {
                //return "Klasse, die Antwort war richtig!";
                $Rightanswer = true;
                $Score =+ 20;
                //dd($request->user()->score =+ 10);
            }
            else
            {
                $Rightanswer = false;
                $Score =- 10;
            }
            $User = User::where('uid', $Userid);
            $User->score = $Score;
            $User->save();
            return response()->json(['Result' => $Rightanswer, 'Score' => $Score, 'Text' => $Quelle->Text, 'Video' => $Quelle->Video]);
        }
        else
        {
            throw new NotFoundHttpException();
        }

    }
}
