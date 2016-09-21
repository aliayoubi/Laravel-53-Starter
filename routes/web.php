<?php

// Route::fakeIdModel('mymodel', 'App\MyModel');

Auth::routes();

# for logs
Route::get('applogs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

#===========================================================#
### PUBLIC ROUTES START ###

Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index')->name('home');

### PUBLIC ROUTES END ###
#===========================================================#

#===========================================================#
### AUTHENTICATED ROUTES START ###

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
});

### AUTHENTICATED ROUTES END ###
#===========================================================#
Auth::routes();

Route::get('/home', 'HomeController@index');
