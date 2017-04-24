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

Route::get('/customers/create', 'CustomerController@create')->name('customer.create');
Route::post('/customers', 'CustomerController@store')->name('customer.store');
Route::get('/customers/{id}', 'CustomerController@show')->name('customer.show');
Route::get('/customers', 'CustomerController@index')->name('customer.index');
Route::get('/customers/{id}/edit', 'CustomerController@edit')->name('customer.edit');
Route::put('/customers/{id}', 'CustomerController@update')->name('customer.update');

Route::get('/boats/create', 'BoatController@create')->name('boat.create');
Route::post('/boats', 'BoatController@store')->name('boat.store');
Route::get('/boats/{id}', 'BoatController@show')->name('boat.show');
Route::get('/boats', 'BoatController@index')->name('boat.index');

Route::get('/reservation_slots/make', 'ReservationSlotsController@showMakeSlotsForDay')->name('reservation_slots.make.show');
Route::post('/reservation_slots/make', 'ReservationSlotsController@doMakeSlotsForDay')->name('reservation_slots.make.do');
Route::get('/reservation_slots/{year}/{month}/{day}', 'ReservationSlotsController@showSlotsForDay')->name('reservation_slots.showforday');
Route::get('/reservation_slots', 'ReservationSlotsController@index')->name('reservation_slots.index');

Route::get('/reservations', 'ReservationController@index')->name('reservation.index');
Route::get('/reservations/create', 'ReservationController@create')->name('reservation.create');
Route::post('/reservations', 'ReservationController@store')->name('reservation.store');
Route::get('/reservations/{id}', 'ReservationController@show')->name('reservation.show');
Route::put('/reservations/{id}', 'ReservationController@update')->name('reservation.update');
Route::get('/reservations/date/{year}/{month}/{day}', 'ReservationController@showByDate')->name('reservations.showbydate');
Route::get('/reservations/{id}/edit', 'ReservationController@edit')->name('reservations.edit');
