<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    if (Auth::check()) {
        $user = Auth::getUser();
        return Redirect::to($user->type);
    } else {
	   return Redirect::to('login')->withErrors(['Usuário não tem acesso ao módulo.']);
    }
});

Route::controller('/login', 'LoginController');


Route::bind('donation', function($value, $route)
{
    try
    {
        return Donation::findOrFail($value);
    }
    catch (Exception $e)
    {
        App::abort(404);
    }
});

Route::bind('donator', function($value, $route)
{
    try
    {
        return Donator::findOrFail($value);
    }
    catch (Exception $e)
    {
        App::abort(404);
    }
});

// RECEPÇÃO
Route::get('/reception', 'ReceptionController@getIndex'); // Página inicial da recepção
Route::get('/reception/call', 'ReceptionController@getCall'); // Chama um doador na fila
Route::get('/reception/{donation}/identification', 'ReceptionController@getIdentification'); // Busca um doador no banco de dados
Route::post('/reception/{donation}/identification', 'ReceptionController@postIdentification'); // Mostra os doadores encontrados
Route::get('/reception/{donation}/link/{donator}', 'ReceptionController@getLink'); // Linka o doador à doação
Route::get('/reception/{donation}/registration', 'ReceptionController@getRegistration'); // Cadastro do doador - form
Route::post('/reception/{donation}/registration', 'ReceptionController@postRegistration'); // Cadastro do doador - salvar
Route::get('/reception/{donation}/treatment', 'ReceptionController@getTreatment'); // Confere dados
Route::post('/reception/{donation}/treatment', 'ReceptionController@postTreatment'); // Confere dados
Route::get('/reception/{donation}/finalization', 'ReceptionController@getFinalization'); // Finaliza a recepção

// PRÉ-TRIAGEM
Route::get('/prescreening', 'PrescreeningController@getIndex'); // Página inicial da pré-triagem
Route::get('/prescreening/call', 'PrescreeningController@getCall'); // Chama um doador na fila
Route::get('/prescreening/{donation}/treatment', 'PrescreeningController@getTreatment'); // Inclui os dados
Route::post('/prescreening/{donation}/treatment', 'PrescreeningController@postTreatment'); // Salva os dados dados
Route::get('/prescreening/{donation}/finalization', 'PrescreeningController@getFinalization'); // Finaliza a pré-triagem

// TRIAGEM
Route::get('/screening', 'ScreeningController@getIndex'); // Página inicial da triagem
Route::get('/screening/call', 'ScreeningController@getCall'); // Chama um doador na fila
Route::get('/screening/{donation}/treatment', 'ScreeningController@getTreatment'); // Inclui os dados
Route::post('/screening/{donation}/treatment', 'ScreeningController@postTreatment'); // Salva os dados dados
Route::get('/screening/{donation}/finalization', 'ScreeningController@getFinalization'); // Finaliza a triagem

// COLETA
Route::get('/collection', 'CollectionController@getIndex'); // Página inicial da coleta
Route::get('/collection/call', 'CollectionController@getCall'); // Chama um doador na fila
Route::get('/collection/{donation}/treatment', 'CollectionController@getTreatment'); // Inclui os dados
Route::post('/collection/{donation}/treatment', 'CollectionController@postTreatment'); // Salva os dados dados
Route::get('/collection/{donation}/finalization', 'CollectionController@getFinalization'); // Finaliza a coleta