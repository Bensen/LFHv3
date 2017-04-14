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
Route::get('/', 'PageController@home')->name('pages.home');
Route::get('ranking', 'PageController@ranking')->name('pages.ranking');
Route::resource('character', 'CharacterController');
Route::resource('team', 'TeamController');
