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

Route::redirect('/', '/flutter-apps');
Route::get('/flutter-apps', 'FlutterAppController@index');

Route::get('/submit-app', 'FlutterAppController@create');
Route::post('/submit-app', 'FlutterAppController@store');
Route::get('/flutter-app/{slug}', 'FlutterAppController@show');