<?php

namespace App\Http\Controllers;

use App\Answer;
use App\User;
use App\user_question;
use Auth;
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
        $json = json_decode($request->getContent());
        $User = Auth::user();
        $Rightanswer = null;


        
        if(isset($json->isTrue))
        {
            //Fake or no Fake
            //dd($json->isTrue);
            $Answer = Answer::where('AID',$json->AID)->firstOrFail();
            $Quelle = $Answer->question->source;
            $beantworteFrage = new user_question;
            $beantworteFrage->qid = $Answer->qid;
            $beantworteFrage->uid = Auth::id();
            $beantworteFrage->save();


            if($Answer->istrue == $json->isTrue)
            {
                //return "Klasse, die Antwort war richtig!";
                $Rightanswer = true;
                $User->score = $User->score + 20;
            }
            else
            {
                $Rightanswer = false;
                $User->score = $User->score - 10;

            }
            if($User->score < 0)
            {
                $User->score = 0;
            }
            $User->save();
            return response()->json(['Result' => $Rightanswer, 'Score' => $User->score, 'Text' => $Quelle->Text, 'Video' => $Quelle->Video, 'Picture' => $Quelle->picURL]);




        }
        else if(isset($json->AID))
        {
            $Answer = Answer::where('AID',$json->AID)->firstOrFail();
            $Quelle = $Answer->question->source;
            $beantworteFrage = new user_question;
            $beantworteFrage->qid = $Answer->qid;
            $beantworteFrage->uid = Auth::id();
            $beantworteFrage->save();
            if($Answer->istrue == true)
            {
                //return "Klasse, die Antwort war richtig!";
                $Rightanswer = true;
                $User->score = $User->score + 10;
            }
            else
            {
                $Rightanswer = false;
                $User->score = $User->score - 5;
            }
            if($User->score < 0)
            {
                $User->score = 0;
            }
            $User->save();
            return response()->json(['Result' => $Rightanswer, 'Score' => $User->score, 'Text' => $Quelle->Text, 'Video' => $Quelle->Video, 'Picture' => $Quelle->picURL]);
        }
        else
        {
            throw new NotFoundHttpException();
        }

    }
}
