<?php

namespace App\Http\Controllers;

use Auth;
use App\Answer;
use App\Category;
use App\Quiz_lock;
use App\Source;
use App\user_question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Question;
use App\Http\Resources\QuestionResource;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        return QuestionResource::collection((Question::all()));
    }

    public function createQuestion(Request $request)  {
        $content = json_decode($request->getContent());

        $source = new Source();
        $source->url = $content->src;
        $source->picURL = $content->img;
        // $source->Video = $content->video;
        $source->Text = $content->srctext;


        $question = new Question();
        $question->questiontext = $content->QuestionText;
        // $question->category = Category::where('name', $content->category);
        $question->save();

        foreach ($content->answers as $raw) {
            if (empty($raw->text)) continue;
            $answer = new Answer();
            $answer->answertext = $raw->text;
            $answer->istrue = $raw->correct;
            $answer->qid = $question->QID;
            $answer->save();
        }

        return $question;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function random()
    {
        //
        $randomquestion = Question::orderBy(\DB::raw('RAND()'))->first();
        return new QuestionResource($randomquestion);
        //return QuestionResource::collection(($randomquestion));

    }
    public function getfive()
    {

        //Check if Quizlock
        $Quizlock = Quiz_lock::where('uid', Auth::id())->first();
        if($Quizlock != null)
        {
            //Check if Quizlock is still usable
            if($Quizlock ->lock_timer < Carbon::Now())
            {
                //Der User kann wieder spielen.
                $Quizlock->delete();
            }
            else
            {
                return response()->json([
                    'Text' => 'Sorry heute gibt es keine Fragen mehr. Komm doch morgen wieder!',
                    'Unlock_Time' => $Quizlock->lock_timer
                ]);

            }

        }

        //GetQuestions


        //Bereits beantworte Fragen
        $Answered = user_question::where('uid', Auth::id())->get();
        $AnsweredArray = $Answered->pluck('qid')->toArray();


        $AllQuestions = Question::whereNotin('QID',$AnsweredArray)->get();
        $FakeornoFake = array();
        $AndereFragen = array();
        foreach($AllQuestions as $question)
        {
            if($question->FakeornoFake() == true)
            {
                $FakeornoFake[] = $question;
            }
            else
            {
                $AndereFragen[] = $question;
            }

        }
        shuffle($FakeornoFake);
        shuffle($AndereFragen);
        $AndereFragen = array_slice($AndereFragen,1,4);

        foreach($AndereFragen as $Fragen)
        {
            $QuestionArray[] = $Fragen;
        }

        $QuestionArray[] = $FakeornoFake[0];

        $randomquestion = $QuestionArray;
        //dd($randomquestion);
        //Set Quizlock
        $Quizlock = new Quiz_lock;
        $Quizlock->uid = Auth::id();
        $Quizlock->islooked = 1;
        $Quizlock->lock_timer = Carbon::now()->addDays(1);
        $Quizlock->save();


        return QuestionResource::collection((collect($randomquestion)));

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $showquestion = Question::where('QID', $id)->firstOrFail();
        return new QuestionResource($showquestion);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
