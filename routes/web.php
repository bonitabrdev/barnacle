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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/constraints/create', 'ConstraintController@create')->name('constraint.create');
Route::post('/constraints', 'ConstraintController@store')->name('constraint.store');
Route::get('/constraints/{id}', 'ConstraintController@show')->name('constraint.show');
Route::get('/constraints', 'ConstraintController@index')->name('constraint.index');
Route::get('/constraints/{id}/edit', 'ConstraintController@edit')->name('constraint.edit');
Route::put('/constraints/{id}', 'ConstraintController@update')->name('constraint.update');

Route::get('/customers/create', 'CustomerController@create')->name('customer.create');
Route::post('/customers', 'CustomerController@store')->name('customer.store');
Route::get('/customers/{id}', 'CustomerController@show')->name('customer.show');
Route::get('/customers', 'CustomerController@index')->name('customer.index');
Route::get('/customers/{id}/edit', 'CustomerController@edit')->name('customer.edit');
Route::put('/customers/{id}', 'CustomerController@update')->name('customer.update');

Route::get('/reservations', 'ReservationController@index')->name('reservation.index');
Route::get('/reservations/create', 'ReservationController@create')->name('reservation.create');
Route::get('/reservations/{id}', 'ReservationController@show')->name('reservation.show');
Route::get('/reservations/{id}/edit', 'ReservationController@edit')->name('reservations.edit');
