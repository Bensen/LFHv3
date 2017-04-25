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
Route::get('/', 'PageController@home')->name('page.home');
Route::get('ranking', 'PageController@ranking')->name('page.ranking');
Route::resource('character', 'CharacterController');
Route::post('/character/{character}/play', 'CharacterController@play')->name('character.play');
Route::resource('team', 'TeamController');
Route::post('team/{team}/kick', 'TeamController@kick')->name('team.kick');
Route::post('team/{team}/apply', 'TeamController@apply')->name('team.apply');
Route::post('team/{team}/leave', 'TeamController@leave')->name('team.leave');
Route::post('team/{team}/accept/{applicant}', 'TeamController@accept')->name('team.accept');
Route::post('team/{team}/reject/{applicant}', 'TeamController@reject')->name('team.reject');
