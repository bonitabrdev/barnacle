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

    Route::post('/reservations/create/requests', 'CreateReservationRequestController@store');
    Route::get('/reservations/create/requests/{id}/status', 'CreateReservationRequestController@status');
});

Route::group(['prefix' => '/reservations', 'middleware' => 'auth'], function () {
    Route::get('/create', 'ReservationController@create')
        ->name('reservation.create');
    Route::get('/create/requests/{id}', 'ReservationController@showRequest');
    Route::get('/{id}', 'ReservationController@show');
    Route::get('/create/failed', 'ReservationController@failed');
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

// debug routes

Route::group(['namespace' => 'Debug', 'prefix' => '/debug'], function () {
    Route::get('/', function() {
        return view('debug.home');
    });

    Route::get('/constraints/create', 'ConstraintController@create')
        ->name('debug.constraint.create');
    Route::post('/constraints', 'ConstraintController@store')
        ->name('debug.constraint.store');
    Route::get('/constraints/{id}', 'ConstraintController@show')
        ->name('debug.constraint.show');
    Route::get('/constraints', 'ConstraintController@index')
        ->name('debug.constraint.index');
    Route::get('/constraints/{id}/edit', 'ConstraintController@edit')
        ->name('debug.constraint.edit');
    Route::put('/constraints/{id}', 'ConstraintController@update')
        ->name('debug.constraint.update');

    Route::get('/customers/create', 'CustomerController@create')
        ->name('debug.customer.create');
    Route::post('/customers', 'CustomerController@store')
        ->name('debug.customer.store');
    Route::get('/customers/{id}', 'CustomerController@show')
        ->name('debug.customer.show');
    Route::get('/customers', 'CustomerController@index')
        ->name('debug.customer.index');
    Route::get('/customers/{id}/edit', 'CustomerController@edit')
        ->name('debug.customer.edit');
    Route::put('/customers/{id}', 'CustomerController@update')
        ->name('debug.customer.update');

    Route::get('/reservations', 'ReservationController@index')
        ->name('debug.reservation.index');
    Route::get('/reservations/create', 'ReservationController@create')
        ->name('debug.reservation.create');
    Route::get('/reservations/{id}', 'ReservationController@show')
        ->name('debug.reservation.show');
    Route::get('/reservations/{id}/edit', 'ReservationController@edit')
        ->name('debug.reservations.edit');
});
