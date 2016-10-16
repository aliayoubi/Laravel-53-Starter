<?php

use Illuminate\Http\Request;

Route::group(['namespace' => 'API', 'prefix' => 'api'], function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:api');

});
