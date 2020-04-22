<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;


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

Route::group(['prefix' => 'transactions'], function (Router $route) {

    $route->post('/', 'TransactionController@store')->name('transactions.store');
    $route->get('/create', 'TransactionController@create')->name('transactions.create');
    $route->get('{category?}', 'TransactionController@index')->name('transactions.list');
    $route->put('{transaction}', 'TransactionController@update')->name('transactions.update');
    $route->get('{transaction}/edit', 'TransactionController@edit')->name('transactions.edit');
    $route->delete('{transaction}/delete', 'TransactionController@destroy')->name('transactions.destroy');

});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
