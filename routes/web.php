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

Route::get('/categories', 'CategoryController@all');
Route::get('/category/{name}/subscribe', 'CategoryController@subscribe');
Route::get('/category/{name}/unsubscribe', 'CategoryController@unsubscribe');

Route::post('/api/v1/question/create', 'QuestionController@createQuestion');

// Route::redirect();
Route::prefix('/api/v1')->group(function () {
    Route::apiResource('questions', 'QuestionController');
    Route::apiResource('category', 'CategoryController');
    Route::get('random', 'QuestionController@random');
    Route::get('getfive', 'QuestionController@getfive');
    Route::post('game/answer', 'GameController@answerquestion');
    Route::get('leaderboard', 'LeaderBoardController@leaderboard');
});
Route::get('/7', function (\Illuminate\Http\Request $request) {
    $categories = [ 'Schlagzeilen', 'Panorama', 'Unterhaltung', 'Wirtschaft', 'Sport', 'Technik', 'Digital', 'Politik', 'Fitness'];

    foreach ($categories as $name) {
        $category = new \App\Category();
        $category->name = $name;
        $category->save();
    }
});

Route::get('/456', function (\Illuminate\Http\Request $request) {
   dd($request->session());
});

Route::get('/123', function () {
    $Quellen = new \App\Source();
    $Quellen->url = "https://www.tagesschau.de/inland/einigung-asylstreit-101.html";
    $Quellen->picURL = "https://www.tagesschau.de/multimedia/bilder/seehofer-657~_v-portraetgrossplus8x9.jpg";
    $Quellen->Video = "http://download.media.tagesschau.de/video/2018/0705/TV-20180705-2225-5101.webxl.h264.mp4";
    $Quellen->Text = "Keine Lager, keine Zurückweisungen, keine nationalen Alleingänge - die Spitzen von CDU, CSU und SPD haben sich auf ein neues Asylpaket geeinigt. Von den \"Transitzentren\" ist keine Rede mehr - dennoch zeigte sich Seehofer zufrieden.
Nach wochenlangem Streit hat die Große Koalition den Streit über die Zurückweisung von Flüchtlingen an der deutsch-österreichischen Grenze beigelegt. Die Spitzen von CDU, CSU und SPD einigten sich auf ein zweiseitiges Papier.
Bundesinnenminister und CSU-Chef Horst Seehofer zeigte sich hochzufrieden: \"Das ist alles von A bis Z so, wie man sich das als zuständiger Minister wünscht.\" Angesprochen auf die umstrittenen \"Transitzentren\" sagte er: \"Sie wissen, dass unser Koalitionspartner Probleme mit dem Begriff 'Transitzentren' hat.\" Deshalb spreche man lieber von \"Transitverfahren in Einrichtungen der Polizei\".
Dieses Verfahren sollen nur jene Flüchtlinge durchlaufen, die bereits einen Asylantrag in einem anderen EU-Staat gestellt haben. Sie sollen innerhalb von 48 Stunden überprüft werden, heißt es. Stattfinden solle dies in Grenznähe in Räumlichkeiten der Bundespolizei oder direkt nach einem Transport zum Flughafen München. Dabei handelt es sich laut Seehofer um höchstens fünf Fälle täglich.";
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
    $Quellen->picURL = "https://www.tagesschau.de/multimedia/bilder/strohhalme-101~_v-portraetgrossplus8x9.jpg";
    $Quellen->Video = "http://download.media.tagesschau.de/video/2018/0528/TV-20180528-2008-5601.webxl.h264.mp4";
    $Quellen->Text = "Schätzungsweise 37 Kilogramm Plastikmüll verursacht allein jeder Deutsche jedes Jahr. EU-weit ist der Müllberg gut 26 Millionen Tonnen schwer. Und ein nicht geringer Teil davon landet in der Umwelt, vor allem in den Meeren in Form gigantischer Müllstrudel von sogenanntem Mikroplastik. Die Folgen für Fische und Vögel, aber letztlich auch für den Menschen seien verheerend, betont EU-Kommissionsvize Frans Timmermans.
Plastik in der Luft, Plastik in den Ozeanen, in der Nahrung und auch in unseren Körpern - der Missstand, den der Niederländer anprangert, wird zu einem ernsten Problem. Deshalb sagte die EU-Kommission auch schon vor längerer Zeit dem Plastikmüll den Kampf an. Eine Richtlinie gegen Einweg-Plastiktüten gibt es bereits; nun legt die Behörde weitere konkrete Vorschläge auf den Tisch.
\"Unsere Richtlinie deckt 70 Prozent des Plastikmülls ab, der an Europas Stränden zu finden ist\", so Timmermans. \"Wir zielen auf die zehn meistverbreiteten Einwegprodukte, die in der Umwelt landen und die sich nur sehr schwer recyceln lassen.\"";
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
    $Quellen->picURL = "https://www.tagesschau.de/ardimport/boerse/hr-boerse-image-8691~_v-portraetgrossplus8x9.jpg";
    $Quellen->Video = null;
    $Quellen->Text = "Handelskriege seien einfach zu gewinnen, twitterte US-Präsident Donald Trump im März. Er macht Ernst und versucht es. Morgen werden Zölle der USA von 25 Prozent auf chinesische Importe im Wert von 34 Milliarden US-Dollar in Kraft treten. Das ist nicht alles. Insgesamt will Trump zunächst Waren im Volumen von 50 Milliarden US-Dollar mit Zöllen belegen.
Die erste Reaktion Chinas ist praktisch ein Spiegel der Trump-Politik: Die Regierung verhängte im Gegenzug Zölle auf US-Waren in ähnlicher Höhe. Aber Chinas Möglichkeiten einer direkten Antwort sind begrenzt, denn Daten und Fakten der Handelsbeziehungen zwischen China und den USA scheinen in der Tat dafür zu sprechen, dass Trump ins Schwarze trifft.
Und Trump dreht die Eskalationsspirale weiter. Auf die Verkündung der chinesischen Antwort stellte er weitere Zölle in Höhe von zehn Prozent auf chinesische Waren im Wert von 200 Milliarden US-Dollar in Aussicht. Damit wäre fast die Hälfte der chinesischen Einfuhren mit Zöllen belastet. Könnte China auch darauf trotz der begrenzten US-Importe schlagkräftig reagieren?";
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
    $Quellen->picURL = "https://www.tagesschau.de/multimedia/bilder/deutschlandtrend-149~_v-portraetgrossplus8x9.jpg";
    $Quellen->Video = "http://download.media.tagesschau.de/video/2018/0705/TV-20180705-2240-5001.webxl.h264.mp4";
    $Quellen->Text = "Eine deutliche Mehrheit der Deutschen findet, dass die Bundesregierung ihren Job nicht ordentlich macht: 78 Prozent der Bürger sind weniger oder gar nicht zufrieden mit der Arbeit der Bundesregierung - das sind 15 Punkte mehr im Vergleich zum Vormonat. Zufrieden mit der Arbeit des Kabinetts sind aktuell nur 21 Prozent. Das hat eine Umfrage von Infratest dimap für den ARD-DeutschlandTrend diese Woche ergeben. Ein solcher Einbruch bei der Zufriedenheit mit der Bundesregierung, von einem Monat auf den anderen, ist im DeutschlandTrend sehr selten gemessen worden.
Als die Bundesregierung Mitte März die Arbeit aufnahm, startete sie auf einem vergleichsweise niedrigen Zustimmungsniveau: Im April waren 32 Prozent der Befragten mit der Arbeit der Bundesregierung sehr zufrieden oder zufrieden; 64 Prozent waren weniger zufrieden oder gar nicht zufrieden.";
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
    $Quellen->picURL = "https://www.sportschau.de/fifa-wm-2018/wm-frankreich-peru-108~_v-ARDFotogalerie.jpg";
    $Quellen->Video = null;
    $Quellen->Text = "16 Uhr: Uruguay - Frankreich
Knochenharte Defensive prallt auf Hochgeschwindigkeitsfußball: Im ersten Viertelfinale muss Uruguay gegen Frankreich ran. Besteht die starke Abwehr der Südamerikaner auch gegen die Stürmer der Equipe Tricolore?
20 Uhr: Brasilien - Belgien
Rekordweltmeister gegen Geheimfavorit: Brasilien trifft im zweiten Viertelfinale auf Belgien. Können die \"Roten Teufel\" die Selecao um Superstar Neymar überraschen?";
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
    $Quellen->picURL = "http://www.tagesschau.de/multimedia/bilder/fussball-502~_v-portraetgrossplus8x9.jpg";
    $Quellen->Video = null;
    $Quellen->Text = "Während der öffentliche Blick sich auf die Fußball-Weltmeisterschaft richtet, kann die Regierung unpopuläre Gesetze verabschieden, ohne eine öffentliche Diskussion befürchten zu müssen - so lautet eine weit verbreitete Behauptung.
Nachzulesen war sie beispielsweise beim \"Handelsblatt\", dem Deutschlandfunk, der \"Frankfurter Rundschau\", der \"Huffington Post\" und den \"Epoch Times\". Als Beispiele werden in vielen Artikeln die gleichen Fälle angeführt. Schlüssig sind aber nicht alle.
Die umstrittene Erhöhung der Mehrwertsteuer wurde zwar am 16. Juni 2006 im Bundesrat beschlossen, dem zweiten Spieltag der WM in Deutschland. Sie stand als Ziel der großen Koalition aber schon im November 2005 fest. Ein entsprechender Gesetzesentwurf war bereits am 17. März 2006 veröffentlicht worden und der Bundestag stimmte am 19. Mai 2006 darüber ab - also 21 Tage vor Beginn der Fußball-WM.
Auch die als Beispiel angeführte Erhöhung der Krankenkassenbeiträge bei der WM 2010 hatte eine lange Vorlaufzeit. Es stimmt zwar, dass die Koalition aus Union und FDP am Tag vor dem Halbfinale Deutschland gegen Spanien einen Gesetzesentwurf eingebracht hatte. Bis zur Verabschiedung des Gesetzes zur \"nachhaltigen und sozial ausgewogenen Finanzierung\" gesetzlicher Krankenversicherungen vergingen aber noch über vier Monate, in denen intensiv über die Gesundheitsreform diskutiert wurde.";
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
    $Quellen->picURL = "http://www.tagesschau.de/multimedia/bilder/pks-111~_v-portraetgrossplus8x9.jpg";
    $Quellen->Video = null;
    $Quellen->Text = "Die Diskussionen über die Entwicklung der Kriminalität in Deutschland stützt sich zumeist auf die Polizeiliche Kriminalstatistik (PKS). Doch allein in Berlin würden in dieser Statistik zehntausende Fälle fehlen, wird im Netz immer wieder behauptet. Grundlage für diese Behauptung ist unter anderem ein Bericht der \"Berliner Zeitung\" aus dem Februar 2018 über unbearbeitete Fälle beim Landeskriminalamt der Hauptstadt - Fälle, mit sogenannten Liegevermerken.
Tatsächlich ist die Zahl der Liegevermerke in Berlin stark angestiegen, wie aus einer Antwort des Senats hervorgeht - vor allem bei Betrugsdelikten und Fällen der organisierten Kriminalität. Missverständlich ist hingegen die Formulierung, diese Fälle würden in Statistiken nicht ausgewiesen. Denn die Fälle tauchen sehr wohl in den Statistiken auf - und zwar, wenn sie ausermittelt sind. Dies stellte die Polizei Berlin nun noch einmal klar.";
    $Quellen->save();
    $Fragen = new \App\Question();
    $Fragen->questiontext = "Die Krux mit den Statistiken: Die Zahlen zur Kriminalität sind nicht vollständig";
    $Fragen->sid = $Quellen->id;
    $Fragen->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->isTrue = false;
    $Antworten->save();


    $Quellen = new \App\Source();
    $Quellen->url = "http://faktenfinder.tagesschau.de/inland/fake-union-101.html";
    $Quellen->picURL = "http://www.tagesschau.de/multimedia/bilder/seehofer-merkel-175~_v-portraetgrossplus8x9.jpg";
    $Quellen->Video = "http://download.media.tagesschau.de/video/2018/0615/TV-20180615-1338-1001.webxl.h264.mp4";
    $Quellen->Text = "\"CSU-Chef Horst Seehofer hat nach einem Bericht des Hessischen Rundfunks das Unionsbündnis mit der CDU aufgekündigt.\" Das meldete die Nachrichtenagentur Reuters erst um 12:19 Uhr auf Englisch und um 12:21 Uhr auf Deutsch. Sie bezog sich dabei auf einen vermeintlichen Bericht des Senders, der sich wiederum auf eine interne E-Mail des hessischen Ministerpräsidenten Volker Bouffier (CDU) berufen habe.
Basis für diese Eilmeldung war ein Tweet, in der Bouffier angeblich verkündet, man müsse sich darauf vorbereiten, bald eine Bayern-CDU aufzubauen. Veröffentlicht wurde dieser Tweet auf einem Profil, das sich zwischenzeitlich \"hr Tagesgeschehen\" nannte.";
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
    $Quellen->picURL = "http://www.tagesschau.de/multimedia/bilder/komasaufen104~_v-portraetgrossplus8x9.jpg";
    $Quellen->Video = null;
    $Quellen->Text = "Die Vizepräsidentin des Bundestags, Claudia Roth, fordere \"mehr Entgegenkommen der Gesellschaft hinsichtlich der Muslime im Land\" ein. \"Ein Verkaufsverbot für Alkohol während des Ramadans sei ein 'wichtiges Zeichen für die Toleranz'.\" So beginnt ein Artikel der Satire-Seite \"Berlin Express\". Die Überschrift lautet: \"Claudia Roth: Im Ramadan soll ein Verkaufsverbot für Alkohol bestehen\".
Mit einem Klick auf die Rubrik \"Über uns\" ist der Hintergrund der Seite zu erkennen. Dort heißt es: \"Wir finden auch, dass es zu wenig Online-Satire gibt. Dem wollen wir mit unserem \"Berliner Express\" entgegentreten.\" Der Herausgeber von \"Berlin Express\" verantwortet auch ein anderes Online-Projekt, das sich als Magazin gegen \"postfaktische Mainstreammedien\" bezeichnet.";
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
    $Quellen->picURL = "http://www.tagesschau.de/multimedia/bilder/becker-129~_v-portraetgrossplus8x9.jpg";
    $Quellen->Video = null;
    $Quellen->Text = "Der ehemalige Tennisstar Boris Becker hat auf der Echtheit seines Diplomatenpasses aus der Zentralafrikanischen Republik bestanden. \"Ich habe diesen Pass vom Botschafter erhalten, ich habe mit dem Präsidenten bei vielen Gelegenheiten gesprochen, es war eine offizielle Ernennung\", sagte Becker in einem Interview mit dem britischen Sender BBC.
Becker hatte zuletzt versucht, in einem in Großbritannien gegen ihn laufenden Insolvenzverfahren diplomatische Immunität geltend zu machen, indem er auf seine Funktion als Sport-Attaché der Vertretung der Zentralafrikanischen Republik bei der EU in Brüssel verwies.";
    $Quellen->save();
    $Fragen = new \App\Question();
    $Fragen->questiontext = "Boris Becker ist Attaché der Zentralafrikanischen Republik.";
    $Fragen->sid = $Quellen->id;
    $Fragen->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->isTrue = true;
    $Antworten->save();

    $Quellen = new \App\Source();
    $Quellen->url = "http://faktenfinder.tagesschau.de/inland/zwangshypotheken-eurorettung-101.html";
    $Quellen->picURL = "http://www.tagesschau.de/multimedia/bilder/neubau-103~_v-portraetgrossplus8x9.jpg";
    $Quellen->Video = null;
    $Quellen->Text = "Das Szenario klingt bedrohlich: Angeblich sind in Europa staatliche Verwertungsagenturen gegründet worden, die darauf warten, aktiviert zu werden. Ihr Ziel: Ein Gesetz umsetzen, das Politiker bereits im Verborgenen planen. Es geht um Zwangshypotheken auf private Immobilien. Mit den Einnahmen solle der Euro gerettet und die Staatshaushalte saniert werden.
    Genau das behaupten selbsternannte \"Aufklärer\" und \"Querdenker\" im Netz. Entsprechende Videos auf YouTube werden zehntausendfach angesehen - und auch über E-Mails werden die Gerüchte verbreitet. Gezielt sollen Ängste geschürt werden - und auf entsprechenden Web-Seiten werden gleich vermeintliche Schutzmaßnahmen angeboten: so beispielsweise eine Daten-CD mit Informationen zu dem Thema für 13 Euro.";
    $Quellen->save();
    $Fragen = new \App\Question();
    $Fragen->questiontext = "Politiker planen in der EU, Zwangshypotheken auf private Immobilien einzuführen. ";
    $Fragen->sid = $Quellen->id;
    $Fragen->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->isTrue = false;
    $Antworten->save();

    $Quellen = new \App\Source();
    $Quellen->url = "http://faktenfinder.tagesschau.de/inland/trolle-btw17-ira-twitter-101.html";
    $Quellen->picURL = "http://www.tagesschau.de/multimedia/bilder/merkel-2349~_v-portraetgrossplus8x9.jpg";
    $Quellen->Video = null;
    $Quellen->Text = "Russische Trolle haben versucht, die Diskussionen in sozialen Medien vor der Bundestagswahl zu manipulieren. Das zeigt eine Analyse aus den USA. Dort wird eine russische Einflussnahme auf den US-Wahlkampf 2016 untersucht.";
    $Quellen->save();
    $Fragen = new \App\Question();
    $Fragen->questiontext = "Russische Trolle haben versucht, auf Twitter den Wahlkampf in Deutschland zu beeinflussen.";
    $Fragen->sid = $Quellen->id;
    $Fragen->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->isTrue = true;
    $Antworten->save();

    $Quellen = new \App\Source();
    $Quellen->url = "http://faktenfinder.tagesschau.de/inland/visa-lotterie-101.html";
    $Quellen->picURL = "http://www.tagesschau.de/multimedia/bilder/grenze-deutschland-oesterreich-107~_v-portraetgrossplus8x9.jpg";
    $Quellen->Video = null;
    $Quellen->Text = "Das Szenario klingt bedrohlich: Angeblich sind in Europa staatliche Verwertungsagenturen gegründet worden, die darauf warten, aktiviert zu werden. Ihr Ziel: Ein Gesetz umsetzen, das Politiker bereits im Verborgenen planen. Es geht um Zwangshypotheken auf private Immobilien. Mit den Einnahmen solle der Euro gerettet und die Staatshaushalte saniert werden.
    Genau das behaupten selbsternannte \"Aufklärer\" und \"Querdenker\" im Netz. Entsprechende Videos auf YouTube werden zehntausendfach angesehen - und auch über E-Mails werden die Gerüchte verbreitet. Gezielt sollen Ängste geschürt werden - und auf entsprechenden Web-Seiten werden gleich vermeintliche Schutzmaßnahmen angeboten: so beispielsweise eine Daten-CD mit Informationen zu dem Thema für 13 Euro.";
    $Quellen->save();
    $Fragen = new \App\Question();
    $Fragen->questiontext = " Es gibt im Internet eine Lotterie, bei der Visa für Deutschland verlost werden.";
    $Fragen->sid = $Quellen->id;
    $Fragen->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->isTrue = false;
    $Antworten->save();

    $Quellen = new \App\Source();
    $Quellen->url = "http://faktenfinder.tagesschau.de/inland/gesetze-wahrend-wm-101.html";
    $Quellen->picURL = "http://www.tagesschau.de/multimedia/bilder/fussball-502~_v-portraetgrossplus8x9.jpg";
    $Quellen->Video = null;
    $Quellen->Text = "Das Szenario klingt bedrohlich: Angeblich sind in Europa staatliche Verwertungsagenturen gegründet worden, die darauf warten, aktiviert zu werden. Ihr Ziel: Ein Gesetz umsetzen, das Politiker bereits im Verborgenen planen. Es geht um Zwangshypotheken auf private Immobilien. Mit den Einnahmen solle der Euro gerettet und die Staatshaushalte saniert werden.
    Genau das behaupten selbsternannte \"Aufklärer\" und \"Querdenker\" im Netz. Entsprechende Videos auf YouTube werden zehntausendfach angesehen - und auch über E-Mails werden die Gerüchte verbreitet. Gezielt sollen Ängste geschürt werden - und auf entsprechenden Web-Seiten werden gleich vermeintliche Schutzmaßnahmen angeboten: so beispielsweise eine Daten-CD mit Informationen zu dem Thema für 13 Euro.";
    $Quellen->save();
    $Fragen = new \App\Question();
    $Fragen->questiontext = "Während der WM werden unpopuläre Gesetze verabschiedet.";
    $Fragen->sid = $Quellen->id;
    $Fragen->save();
    $Antworten = new \App\Answer();
    $Antworten->qid = $Fragen->id;
    $Antworten->isTrue = false;
    $Antworten->save();

});
Route::any('/app/{any?}', 'HomeController@index')->where('any', '[\/\w\.-]*');
