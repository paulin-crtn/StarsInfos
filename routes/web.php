<?php

use Illuminate\Support\Facades\Route;

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

// PUBLIC

Route::get('/', 'StarController@index');
Route::get('/star/{id}', 'StarController@show');

// BACK OFFICE

Route::get('/manage-star/create', 'ManageStarController@index');
Route::post('/manage-star/create', 'ManageStarController@store');

Route::get('/manage-star/update/{id}', 'ManageStarController@show');
Route::post('/manage-star/update/{id}', 'ManageStarController@update');

Route::get('/manage-star/delete/{id}', 'ManageStarController@delete');