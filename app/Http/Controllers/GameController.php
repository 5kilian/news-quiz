<?php

namespace App\Http\Controllers;

use App\Answer;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GameController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function answerquestion(Request $request)
    {
        //
        $Fakeuser = User::where('id', 1)->firstorfail();
        $Fakeuser->score;
        $Rightanswer = null;

        $Userid = $Fakeuser->id;


        if($request->has('isTrue'))
        {
            //Fake or no Fake

            $Answer = Answer::where('AID',$request->input('AID'))->firstOrFail();
            $Quelle = $Answer->question->source;


            if($Answer->istrue == true)
            {
                //return "Klasse, die Antwort war richtig!";
                $Rightanswer = true;
                $Fakeuser->score = $Fakeuser->score + 20;
            }
            else
            {
                $Rightanswer = false;
                $Fakeuser->score = $Fakeuser->score - 10;

            }
            $Fakeuser->save();
            return response()->json(['Result' => $Rightanswer, 'Score' => $Fakeuser->score, 'Text' => $Quelle->Text, 'Video' => $Quelle->Video]);




        }
        else if($request->has('AID'))
        {
            $Answer = Answer::where('AID',$request->input('AID'))->firstOrFail();
            $Quelle = $Answer->question->source;
            if($Answer->istrue == true)
            {
                //return "Klasse, die Antwort war richtig!";
                $Rightanswer = true;
                $Fakeuser->score = $Fakeuser->score + 10;
            }
            else
            {
                $Rightanswer = false;
                $Fakeuser->score = $Fakeuser->score - 5;
            }
            $Fakeuser->save();
            return response()->json(['Result' => $Rightanswer, 'Score' => $Fakeuser->score, 'Text' => $Quelle->Text, 'Video' => $Quelle->Video]);
        }
        else
        {
            throw new NotFoundHttpException();
        }

    }
}
