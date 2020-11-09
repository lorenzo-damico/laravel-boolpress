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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth')->group(function () {
      Route::get('/', 'HomeController@index')->name('home');
      Route::resource('articles', 'ArticleController');
});

// Rotte pubbliche articoli per i guest
Route::get('articles', 'ArticleController@index')->name('articles.index');
Route::get('articles/{slug}', 'ArticleController@show')->name('articles.show');
