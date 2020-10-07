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

Route::group(['namespace' => 'App\Http\Controllers\Api', 'as' => 'api.'], function (){
    Route::get('/estado', 'EstadoController@index');
    Route::get('/municipio', 'MunicipioController@index');
    Route::get('/regiao', 'RegiaoController@index');
    Route::get('/consultar', 'ConsultaDadosController@index');
});
