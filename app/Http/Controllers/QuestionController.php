<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Category;
use App\Source;
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
        //
        $randomquestion = Question::orderBy(\DB::raw('RAND()'))->take(5)->get();
        //dd($randomquestion);
        //return new QuestionResource($randomquestion);
        return QuestionResource::collection(($randomquestion));

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
