<?php

### auth routes ###
Auth::routes();

### for logs ###
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
    Route::get('dashboard', 'TasksController@index')->name('dashboard');
    Route::post('task/store', 'TasksController@store')->name('task.store');
    Route::get('task/edit/{task}', 'TasksController@edit')->name('task.edit');
    Route::post('task/update/{task}', 'TasksController@update')->name('task.update');
    Route::get('task/complete/{task}', 'TasksController@complete')->name('task.complete');
    Route::delete('task/destroy/{task}', 'TasksController@destroy')->name('task.destroy');
});

### AUTHENTICATED ROUTES END ###
#===========================================================#
