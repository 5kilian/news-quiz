<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::apiResource('questions', 'QuestionController');
    Route::get('random', 'QuestionController@random');
    Route::get('getfive', 'QuestionController@getfive');
    Route::get('game/answer', 'GameController@answerquestion');
});
/*Route::prefix('v1')->group(function () {
    Route::get('questions/random', function () {
        $randomquestion = \App\Question::orderBy(\DB::raw('RAND()'))->with(['category','answers','source'])->first();
        return $randomquestion;
        //$randomquestion);
    });
    Route::get('questions/{question}', function (App\Question $question) {
        return $question;
    });
    Route::get('answers/{answer}', function (App\Answer $answer) {
        return $answer;
    });
    Route::post('questions/create', function () {
        $question = new \App\Question();
        $question->questiontext = 'Hello World?';
        $question->cid = 1;
        $question->sid = 1;
        $question->save();
        return $question;
    });
});*/
