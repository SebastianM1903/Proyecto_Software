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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
Route::get('/usuario', 'AuthController@getUsers');
Route::delete('usuario/{id}', 'AuthController@destroyUser')
                ->name('usuario.destroy');

Route::get('/reserva/{id_ambiente}/ambiente/{mes}/mes', 'ReservaController@reservasByAmbiente');
//reservasByAmbiente
Route::apiResource('/ambiente','AmbienteController');
Route::apiResource('/reserva','ReservaController');
Route::put('/usuario/{id}', 'AuthController@updateUser');
Route::any('prueba','ReservaController@enviarNotificacion' );
//
//Route::get('/color', 'AuthController@getUsers');
Route::apiResource('/color','ColorController');
Route::apiResource('/carrera','CarreraController');

