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

Route::get('/transactions/create', 'TransactionController@create')->name('transactions.create');
Route::get('/transactions/{category?}', 'TransactionController@index')->name('transactions.list');
Route::post('/transactions', 'TransactionController@store')->name('transactions.store');
Route::put('/transactions/{transaction}', 'TransactionController@update')->name('transactions.update');
Route::get('/transactions/{transaction}/edit', 'TransactionController@edit')->name('transactions.edit');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
