<?php

// Route::fakeIdModel('mymodel', 'App\MyModel');

Auth::routes();

# for logs
Route::get('applogs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

#===========================================================#
### PUBLIC ROUTES START ###

Route::get('/', function () {
    return view('pages.home.index');
});

### PUBLIC ROUTES END ###
#===========================================================#

#===========================================================#
### AUTHENTICATED ROUTES START ###

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

### AUTHENTICATED ROUTES END ###
#===========================================================#
Auth::routes();

Route::get('/home', 'HomeController@index');
