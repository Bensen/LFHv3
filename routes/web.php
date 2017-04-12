<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('tests', 'TestController@index');
Route::get('tests/{test}', 'TestController@show');
Route::get('/', 'PageController@home');
Route::get('characters', 'CharacterController@index');
Route::get('characters/create', 'CharacterController@create');
Route::post('characters', 'CharacterController@store');