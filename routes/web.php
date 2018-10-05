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

Route::group(['prefix' => 'customers'], function () {
    Route::get('/', 'CustomerController@index')->name('customers_index');
});

Route::group(['prefix' => 'home'], function (){
    Route::get('/', function (){
        return view('welcome');
    })->name('welcome');

    Route::get('/task', 'TaskController@index')->name('tasks_index');

    Route::get('/add', 'TaskController@create')->name('task_create');

    Route::post('/add', 'TaskController@store')->name('task_add');
});
