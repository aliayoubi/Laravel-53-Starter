<?php
#===========================================================#
### PUBLIC ROUTES START ###

Route::get('/', 'AdminController')->name('admin_login');
Route::post('login', 'AdminController@login');

### PUBLIC ROUTES END ###
#===========================================================#

#===========================================================#
### AUTHENTICATED ROUTES START ###
Route::group(['middleware' => 'admin'], function () {
    Route::get('logout', 'AdminController@logout')->name('admin_logout');
    Route::get('panel', 'AdminController@index')->name('admin_panel');
});

### AUTHENTICATED ROUTES END ###
#===========================================================#
