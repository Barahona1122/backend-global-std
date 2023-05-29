<?php
Route::prefix('v1')->namespace('App\Http\Controllers\API\App\Admin')->group(function(){
    // TODO: IMPLEMENT MIDDLEWARE

    // MOVIES
    Route::get('movies', 'MovieController@getMovies');
    Route::put('update-movie', 'MovieController@update');
    Route::post('store-movie', 'MovieController@store');
    Route::put('delete-movie', 'MovieController@delete');
    Route::put('restore-movie', 'MovieController@restore');


    // SHIFTS
    Route::get('shift', 'ShiftController@getShift');
    Route::put('update-shift', 'ShiftController@update');
    Route::post('store-shift', 'ShiftController@store');
    Route::put('delete-shift', 'ShiftController@delete');
    Route::put('restore-shift', 'ShiftController@restore');


    // Logout
    Route::post('logout', 'Auth\AuthController@logOut');
});