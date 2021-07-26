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
Route::get('/berita', 'BeritaController@tampil');
Route::get('/berita/{berita}', 'BeritaController@shows');
Route::post('/berita', 'BeritaController@tambah');
Route::patch('/berita/{berita}', 'BeritaController@ubah');
Route::delete('/berita/{berita}', 'BeritaController@hapus');

Route::get('/jurnalis', 'JournalistController@tampil');
Route::get('/jurnalis/{jurnalis}', 'JournalistController@shows');
Route::post('/jurnalis', 'JournalistController@tambah');
Route::patch('/jurnalis/{jurnalis}', 'JournalistController@ubah');
Route::delete('/jurnalis/{jurnalis}', 'JournalistController@hapus');