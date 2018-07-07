<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        return QuestionResource::collection((Question::all()));
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
