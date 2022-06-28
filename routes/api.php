<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', 'Auth\LoginController@loginApi');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/sistema/{formulario}', 'FormularioController@showApi');
    Route::post('ronda', 'RondaController@storeApi');
    // Route::get('/proyectos', 'ProyectoController@indexApi');
    // Route::get('/proyectos/{proyecto}', 'ProyectoController@showApi');
    // Route::post('/proyectos/{proyecto}/encuesta', 'ProyectoController@encuestaStoreApi');
    // Route::post('/proyectos/{proyecto}/infraestructura', 'ProyectoController@infraestructuraStoreApi');

});


Route::get('/{anything}', function () {
    return response(['success_code' => '500', 'success_message' => 'El endpoint no existe']);
});

Route::post('/{anything}', function () {
    return response(['success_code' => '500', 'success_message' => 'El endpoint no existe']);
});
