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
        //$this->middleware('auth');
    }
    public function answerquestion(Request $request)
    {
        //

        if($request->has('isTrue'))
        {
            //Fake or no Fake
            $Answer = Answer::where('AID',$request->input('AID'))->firstOrFail();

            if($Answer->istrue == true)
            {
                //return "Klasse, die Antwort war richtig!";
                return response()->json(['Result' => true, 'Score' => 20, 'Text' => "Lorem ipsum" , 'Video' => "Lorem Ipsum"]);
                //dd($request->user()->score =+ 10);
            }



        }
        else if($request->has('AID'))
        {
            $Answer = Answer::where('AID',$request->input('AID'))->firstOrFail();
            //$model = App\Flight::where('legs', '>', 100)->firstOrFail();
            //dd($Answer);
            if($Answer->istrue == true)
            {
                //return "Klasse, die Antwort war richtig!";
                return response()->json(['Result' => true, 'Score' => 20, 'Text' => "Lorem ipsum" , 'Video' => "Lorem Ipsum"]);
                //dd($request->user()->score =+ 10);
            }
        }
        else
        {
            throw new NotFoundHttpException();
        }
    }
}
