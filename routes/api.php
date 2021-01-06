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

Route::namespace('Api')->name('api.')->group(function () {
    Route::prefix('car')->group(function () {
        //Todas para ter como saida o json
        Route::get('/', 'CarroController@index')->name('allcars');                 //Todos os carros
        Route::get('/pag', 'CarroController@pagination')->name('allcarpag');       //Todos os carros de modo paginado
        Route::get('/{id}', 'CarroController@show')->name('carsid');               //Busca do automovel pelo ID

        Route::post('/', 'CarroController@store')->name('carnew');                 //Salvando o carro no banco de dados atraves do metodo post

        Route::put('/{id}', 'CarroController@update')->name('updatecar');          //Atualizando o carro no banco de dados atraves do metodo put

        Route::delete('/{id}', 'CarroController@delete')->name('delcarros');       //Deletando o carro do banco de dados atraves do metodo post
    });
});
