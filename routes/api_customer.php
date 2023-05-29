<?php
Route::prefix('v1')->namespace('App\Http\Controllers\API\App\Customer')->group(function(){
    Route::post('register', 'Auth\AuthController@register');
    Route::post('login', 'Auth\AuthController@logIn');
});