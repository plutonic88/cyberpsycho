<?php






Auth::routes();

Route::get('/', 'GamesController@index')->name('home');


Route::get('/', ['as' => '/', 'uses' => 'GamesController@index']);




Route::get('/config', 'GamesController@config');


Route::get('/configprac', 'GamesController@configprac');

Route::get('/defstrategyfullinfo', 'GamesController@getDefStrategyFullinfo');


Route::get('/defstrategynoinfo', 'GamesController@getDefStrategyNoinfo');








Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');





Route::get('/login', 'SessionsController@create');

Route::get('/login', ['as' => '/login', 'uses' => 'SessionsController@create']);


Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);


Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');







Route::get('/home', 'GamesController@index');

Route::get('home', ['as' => 'home', 'uses' => 'GamesController@index']);





Route::get('/instruction', 'GamesController@show');


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




Route::get('/games/play', 'GamesController@selectgame1');


Route::get('/games/{gametype}/{done}', 'GamesController@playgame1');

//Route::get('/games/{gametype}', 'GamesController@playgame');








//Route::get('/practicegame', 'GamesController@startpracticegame');



Route::post('/gamehistory/save', 'GamehistoryController@store');

Route::post('/gamehistory/savetentative', 'GamehistoryController@storetentative');

Route::post('/gamehistory/saveinit', 'GamehistoryController@storeinit');

Route::post('/gamehistory/savemouse', 'GamehistoryController@storemouse');

Route::post('/gamehistory/savemouseonnode', 'GamehistoryController@storemouseonnode');

Route::post('/gamehistory/saveeye', 'GamehistoryController@storeeye');




Route::get('/chart/{id}', 'GamesController@showcharts');


Route::get('/mouse/{id}', 'GamesController@showmouse');

Route::get('/mouseonnode/{id}', 'GamesController@showmouseonnode');






