<?php
Route::group(['middleware' => 'XSSProtection'], function () {
    Route::group(['namespace' => 'Frontend'], function () {

        ### auth routes ###
        Auth::routes();

        ### for logs ###
        Route::get('__applogs__', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

        #===========================================================#
        ### PUBLIC ROUTES START ###

        Route::get('/', 'HomeController')->name('home');
        Route::get('home', 'HomeController')->name('home');

        ### PUBLIC ROUTES END ###
        #===========================================================#

        #===========================================================#
        ### AUTHENTICATED ROUTES START ###

        Route::group(['middleware' => 'auth'], function () {
            Route::get('dashboard', 'TasksController@index')->name('dashboard');
            Route::post('tasks', 'TasksController@store')->name('task.store');
            Route::get('tasks/{task}/edit', 'TasksController@edit')->name('task.edit');
            Route::patch('tasks/{task}', 'TasksController@update')->name('task.update');
            Route::delete('tasks/{task}', 'TasksController@destroy')->name('task.destroy');
            Route::get('tasks/{task}/complete', 'TasksController@complete')->name('task.complete');
        });

        ### AUTHENTICATED ROUTES END ###
        #===========================================================#
    });

###############################################################################


###############################################################################
# DON'T EDIT BELOW THS LINE
###############################################################################
    Route::group(['namespace' => 'Backend', 'prefix' => 'admin'], function () {
        require(__DIR__ . '/web_backend.php');
    });
});