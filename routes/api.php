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

Route::get('/tags', 'TagController@index');
Route::get('/tags/{id}', 'TagController@show');
Route::post('/tags', 'TagController@store');
Route::delete('/tags/{id}', 'TagController@destroy');

// Route::apiResource('articles', 'ArticleController');
// Route::post('/articles', 'ArticleController@store');
// Route::put('/articles/{id}', 'ArticleController@edit');
Route::middleware('auth:api')->get('/articles', 'ArticleController@index');
// Route::get('/articles/{id}', 'ArticleController@show');

Route::apiResource('gathers', 'GatherController');

Route::post('/upload', 'UploadController@store');

Route::apiResource('says', 'SayController');

Route::post('/user/login', 'Auth\LoginController@authenticate');




