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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

  Route::resource('category','api\CategoryController');
  Route::get('index','api\CategoryController@index');
  Route::post('store','api\CategoryController@store');
  Route::put('update/{id}','api\CategoryController@update');
  Route::delete('destroy/{id}','api\CategoryController@destroy');

  Route::post('/register','api\CategoryController@register');
  Route::post('/login','api\CategoryController@login');
  Route::get('/getuser','api\CategoryController@getuser');
