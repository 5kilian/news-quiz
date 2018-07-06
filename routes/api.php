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
    Route::get('questions/random', function () {
        return 'Random post';
    });
    Route::get('questions/{question}', function (App\Question $question) {
        return $question;
    });
    Route::get('answers/{answer}', function (App\Answer $answer) {
        return $answer;
    });
    Route::post('questions/create', function () {
        return 'Question created';
    });
});
