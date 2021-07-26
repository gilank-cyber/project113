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
Route::get('/berita', 'BeritaController@index');
Route::post('/berita', 'BeritaController@create');
Route::patch('/berita/{berita}', 'BeritaController@edit');
Route::delete('/berita/{berita}', 'BeritaController@destroy');

Route::get('/jurnalis', 'JournalistController@index');
Route::post('/jurnalis', 'JournalistController@create');
Route::patch('/jurnalis/{jurnalis}', 'JournalistController@edit');
Route::delete('/jurnalis/{jurnalis}', 'JournalistController@destroy');