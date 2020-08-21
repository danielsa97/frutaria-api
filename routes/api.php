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
    Route::get('/home/{name}', 'HomeController@index')->name('home.index');

    //Clientes
    Route::group(['prefix' => 'cliente', 'as' => 'cliente.'], function () {
        Route::get('/', 'ClienteController@index')->name('index');
        Route::post('/', 'ClienteController@store')->name('store');
        Route::get('{id}/edit', 'ClienteController@edit')->name('edit');
        Route::put('{id}', 'ClienteController@update')->name('update');
        Route::get('search', 'ClienteController@search')->name('search');
        Route::put('{id}/change-status', 'ClienteController@changeStatus')->name('change-status');
    });

    //Frutas
    Route::group(['prefix' => 'fruta', 'as' => 'fruta.'], function () {
        Route::get('/', 'FrutaController@index')->name('index');
        Route::post('/', 'FrutaController@store')->name('store');
        Route::get('{id}/edit', 'FrutaController@edit')->name('edit');
        Route::put('{id}', 'FrutaController@update')->name('update');
        Route::get('search', 'FrutaController@search')->name('search');
        Route::put('{id}/change-status', 'FrutaController@changeStatus')->name('change-status');
    });

    //Vendas
    Route::group(['prefix' => 'venda', 'as' => 'venda.'], function () {
        Route::get('/', 'VendaController@index')->name('index');
        Route::post('/', 'VendaController@store')->name('store');
        Route::get('{id}/show', 'VendaController@edit')->name('show');
    });

});
