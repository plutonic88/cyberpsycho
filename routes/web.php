<?php




// Will start working on n

Auth::routes();

Route::get('/', 'GamesController@index')->name('home');


Route::get('/', ['as' => '/', 'uses' => 'GamesController@index']);




Route::get('/config', 'GamesController@config');


Route::get('/configprac', 'GamesController@configprac');


Route::get('/defstrategy', 'GamesController@getDefStrategy');

Route::get('/testdefstrategy', 'GamesController@testDefStrat');


Route::get('/defstrategyfullinfo', 'GamesController@getDefStrategyFullinfo');


Route::get('/defstrategyallpoint', 'GamesController@getDefStrategyAllPoint');










Route::post('/register', 'RegistrationController@store');
Route::get('/register', 'RegistrationController@create');





Route::get('/login', 'SessionsController@create');

Route::get('/login', ['as' => '/login', 'uses' => 'SessionsController@create']);


Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);


Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');







Route::get('/home', 'GamesController@index');

Route::get('home', ['as' => 'home', 'uses' => 'GamesController@index']);





Route::get('/instruction', 'GamesController@show');


//Route::post('/instruction/storestart', 'GamesController@storestart');

Route::post('/instruction/storeend', 'GamesController@storeend');






Route::get('/survey', 'GamesController@startsurvey');



Route::post('storesurvey', 'GamesController@storesurvey');







Route::post('/instruction', 'GamesController@showinstruction');


Route::get('/instruction/concept', 'GamesController@showqaconceptual');

Route::post('/instruction/concept', 'GamesController@storeqaconceptual');




Route::get('/instruction/gameend', 'GamesController@showending');

Route::post('/instruction/gameend', 'GamesController@storeending');





//Route::get('/games/{id}', 'GamesController@startgame');

//Route::get('/games', 'GamesController@playgame');




Route::get('/games/prac', 'GamesController@practicegame');


Route::get('/games/pracfullinfo', 'GamesController@practicegamefullinfo');


Route::get('/games/pracnoinfo', 'GamesController@practicegamenoinfo');




//Route::get('/games/play', 'GamesController@selectgame1');


//Route::get('/games/{gametype}/{done}', 'GamesController@playgame1');




Route::get('/games/play', 'GamesController@selectgamev2');


Route::get('/games/{gametype}/{done}', 'GamesController@playgamev2');

//Route::get('/games/{gametype}', 'GamesController@playgame');








//Route::get('/practicegame', 'GamesController@startpracticegame');






Route::post('/gamehistory/incrementgameplayed', 'GamehistoryController@updateGamePlayed');

Route::post('/gamehistory/save', 'GamehistoryController@store');


Route::get('/gamehistory/checkforend', 'GamehistoryController@checkForEnd');





Route::post('/gamehistory/savecompactinfo', 'GamehistoryController@storeCompact');




Route::post('/gamehistory/savetentative', 'GamehistoryController@storetentative');

Route::post('/gamehistory/saveinit', 'GamehistoryController@storeinit');

Route::post('/gamehistory/savemouse', 'GamehistoryController@storemouse');

Route::post('/gamehistory/savemouseonnode', 'GamehistoryController@storemouseonnode');

Route::post('/gamehistory/saveeye', 'GamehistoryController@storeeye');




Route::get('/chart/{id}', 'GamesController@showcharts');


Route::get('/insduration', 'GamesController@showinsduration');


Route::get('/inscount', 'GamesController@showinscount');


Route::get('/mouse/{id}', 'GamesController@showmouse');

Route::get('/mouseonnode/{id}', 'GamesController@showmouseonnode');






