<?php

Auth::routes();

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/json', 'namespace' => 'Json', 'middleware' => 'auth'], function () {
    Route::get('/constraints/date/{year}-{month}-{day}', 'ConstraintController@getByDate');
    Route::post('/constraints', 'ConstraintController@store');
    Route::post('/constraints/range', 'ConstraintController@storeRange');
    Route::get('/constraints/range/{first}/{last}', 'ConstraintController@getRange');

    Route::post('/customers', 'CustomerController@store');
    Route::get('/customers/phone/{phone}', 'CustomerController@findByPhone');
    Route::put('/customers/{id}', 'CustomerController@update');

    Route::post('/reservations', 'ReservationController@store');
    Route::get('/reservations/table/{date}', 'ReservationController@getTable');
});

Route::group(['prefix' => '/reservations', 'middleware' => 'auth'], function () {
    Route::get('/create', 'ReservationController@create')
        ->name('reservation.create');
    Route::get('/{id}', 'ReservationController@show');
});

Route::group(['prefix' => '/admin'], function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard', 'AdministrationController@dashboard')
        ->name('admin.dashboard');
    Route::get('/constraints', 'AdministrationController@manageConstraints')
        ->name('admin.constraints.manage');
    Route::get('/users', 'AdministrationController@manageUsers')
        ->name('admin.users.manage');
    Route::get('/settings', 'AdministrationController@manageSettings')
        ->name('admin.settings.manage');
});
