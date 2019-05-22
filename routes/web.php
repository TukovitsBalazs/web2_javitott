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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'TravelController@index');

    Route::get('/newtravel', function(){
        return view('newtravel');
    });

    Route::post('/newtravel', 'TravelController@hozzaad');

    Route::get('/uj', 'BlogPostController@create');

    Route::post('/uj', 'BlogPostController@store');

    Route::get('/posts/{id}', 'BlogPostController@show');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/jelentkezes/{travel}', 'TravelController@add')->name('jelentkezes');

    Route::get('/bovebben/{travel}', 'TravelController@bovebben')->name('bovebben');
});
