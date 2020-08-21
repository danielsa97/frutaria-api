<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth', 'namespace' => 'Auth', 'as' => 'auth.'], function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::get('refresh', 'AuthController@refresh')->name('refresh');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('user', 'AuthController@user')->name('user');
        Route::post('logout', 'AuthController@logout')->name('logout');
    });
});


//AUTHENTICATED ROUTES
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/home', 'HomeController@index')->name('home.index');

    //Clientes
    Route::group(['prefix' => 'cliente', 'as' => 'cliente.'], function () {
        Route::get('/', 'ClienteController@index')->name('index');
        Route::post('/', 'ClienteController@store')->name('store');
        Route::get('{id}/edit', 'ClienteController@edit')->name('edit');
        Route::put('{id}', 'ClienteController@update')->name('update');
        Route::put('{id}/change-status', 'ClienteController@changeStatus')->name('change-status');
    });

    //Users
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::post('/', 'UserController@store')->name('store');
        Route::get('{id}/edit', 'UserController@edit')->name('edit');
        Route::put('{id}', 'UserController@update')->name('update');
        Route::put('{id}/change-status', 'UserController@changeStatus')->name('change-status');
    });
});
