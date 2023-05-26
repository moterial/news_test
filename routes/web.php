<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
        Route::get('/dashboard/addnews', 'NewsController@index')->name('news.create');
        Route::post('/dashboard/addnews', 'NewsController@add')->name('news.add');
        Route::get('/dashboard/editnews/{id}', 'NewsController@edit')->name('news.edit');
        Route::get('/dashboard/deletenews/{id}', 'NewsController@delete')->name('news.delete');
        Route::post('/dashboard/editnews/{id}', 'NewsController@update')->name('news.update');


    });
});
