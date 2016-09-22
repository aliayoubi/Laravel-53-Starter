<?php

### auth routes ###
Auth::routes();

### for logs ###
Route::get('applogs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

#===========================================================#
### ROUTE MODEL BINDING START ###
//
### ROUTE MODEL BINDING END ###
#===========================================================#

#===========================================================#
### PUBLIC ROUTES START ###

Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index')->name('home');

### PUBLIC ROUTES END ###
#===========================================================#

#===========================================================#
### AUTHENTICATED ROUTES START ###

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'TasksController@index')->name('dashboard');
    Route::post('/store', 'TasksController@store')->name('task.store');
});

### AUTHENTICATED ROUTES END ###
#===========================================================#
