<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/123', function () {
    $Quellen = new \App\Source();
    $Quellen->url = "";
    $Quellen->save();
    //dd($Quellen->id);
    $Fragen = new \App\Question();
    $Fragen->questiontext = "Worauf haben sich CDU, CSU und SPD gestern Abend im Koalitionsauschuss geeinigt?";
    $Fragen->sid = $Quellen->id;
    $Fragen->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->answertext = "Neues Asylpaket";
    $Antworten->isTrue = true;
    $Antworten->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->answertext = "Neuwahlen";
    $Antworten->isTrue = false;
    $Antworten->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->answertext = "Verlängerung der Sommerpause für Politiker";
    $Antworten->isTrue = false;
    $Antworten->save();



    $Quellen = new \App\Source();
    $Quellen->url = "https://www.tagesschau.de/ausland/eu-plastikverbote-103.html";
    $Quellen->save();
    $Fragen = new \App\Question();
    $Fragen->questiontext = "Welches Produkt wollen Lidl und Rewe bis Ende kommendes Jahres aus ihren Geschäften verbannen?";
    $Fragen->sid = $Quellen->id;
    $Fragen->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->answertext = "Tiefkühlpizzen";
    $Antworten->isTrue = false;
    $Antworten->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->answertext = "Strohhalme";
    $Antworten->isTrue = true;
    $Antworten->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->answertext = "Kaugummi";
    $Antworten->isTrue = false;
    $Antworten->save();



    $Quellen = new \App\Source();
    $Quellen->url = "https://www.tagesschau.de/wirtschaft/boerse/china-handelskrieg-101.html";
    $Quellen->save();
    $Fragen = new \App\Question();
    $Fragen->questiontext = "Welches Land hat Zölle gegen US-Waren verhängt?";
    $Fragen->sid = $Quellen->id;
    $Fragen->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->answertext = "China";
    $Antworten->isTrue = true;
    $Antworten->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->answertext = "Venezuela";
    $Antworten->isTrue = false;
    $Antworten->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->answertext = "Russland";
    $Antworten->isTrue = false;
    $Antworten->save();

    $Quellen = new \App\Source();
    $Quellen->url = "https://www.tagesschau.de/inland/deutschlandtrend/index.html";
    $Quellen->save();
    $Fragen = new \App\Question();
    $Fragen->questiontext = "Wie viel Prozent der Deutschen sind mit der Regierung unzufrieden?";
    $Fragen->sid = $Quellen->id;
    $Fragen->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->answertext = "23 %";
    $Antworten->isTrue = false;
    $Antworten->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->answertext = "41 %";
    $Antworten->isTrue = false;
    $Antworten->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->answertext = "78 %";
    $Antworten->isTrue = true;
    $Antworten->save();

    $Quellen = new \App\Source();
    $Quellen->url = "https://www.sportschau.de/fifa-wm-2018/fifa-wm-ueberblick-viertelfinale-tag-eins-100.html";
    $Quellen->save();
    $Fragen = new \App\Question();
    $Fragen->questiontext = "Welche Länder spielen heute im WM-Viertelfinale?";
    $Fragen->sid = $Quellen->id;
    $Fragen->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->answertext = "Frankreich, Belgien, Brasilien, Uruguay";
    $Antworten->isTrue = true;
    $Antworten->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->answertext = "Deutschland, Brasilien, Polen, Argentinien";
    $Antworten->isTrue = false;
    $Antworten->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->answertext = "Brasilien, Island, Kroatien, Deutschland";
    $Antworten->isTrue = false;
    $Antworten->save();

    $Quellen = new \App\Source();
    $Quellen->url = "http://faktenfinder.tagesschau.de/inland/gesetze-wahrend-wm-101.html";
    $Quellen->save();
    $Fragen = new \App\Question();
    $Fragen->questiontext = "Gesetze während der WM: Unbemerkt verabschiedet?";
    $Fragen->sid = $Quellen->id;
    $Fragen->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->isTrue = false;
    $Antworten->save();


    $Quellen = new \App\Source();
    $Quellen->url = "http://faktenfinder.tagesschau.de/inland/kriminalstatistik-pks-berlin-101.html";
    $Quellen->save();
    $Fragen = new \App\Question();
    $Fragen->questiontext = "Zahlen zur Kriminalität: Die Krux mit den Statistiken";
    $Fragen->sid = $Quellen->id;
    $Fragen->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->isTrue = false;
    $Antworten->save();


    $Quellen = new \App\Source();
    $Quellen->url = "http://faktenfinder.tagesschau.de/inland/fake-union-101.html";
    $Quellen->save();
    $Fragen = new \App\Question();
    $Fragen->questiontext = "Ende des Unionsbündnisses? Medien fallen auf Fake herein";
    $Fragen->sid = $Quellen->id;
    $Fragen->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->isTrue = false;
    $Antworten->save();

    $Quellen = new \App\Source();
    $Quellen->url = "https://faktenfinder.tagesschau.de/inland/alkoholverbot-roth-ramadan-101.html";
    $Quellen->save();
    $Fragen = new \App\Question();
    $Fragen->questiontext = "Grüne fordern kein Alkoholverbot im Ramadan";
    $Fragen->sid = $Quellen->id;
    $Fragen->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->isTrue = false;
    $Antworten->save();

    $Quellen = new \App\Source();
    $Quellen->url = "http://www.tagesschau.de/ausland/becker-diplomat-105.html";
    $Quellen->save();
    $Fragen = new \App\Question();
    $Fragen->questiontext = "Boris Becker ist Attaché der Zentralafrikanischen Republik.";
    $Fragen->sid = $Quellen->id;
    $Fragen->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->isTrue = true;
    $Antworten->save();

});
Route::get('/home', 'HomeController@index')->name('home');
