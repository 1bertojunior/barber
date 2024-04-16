<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::get('test', 'App\Http\Controllers\API\TestController@v1');

    Route::prefix('auth')->group(function () {
        Route::post('login', 'App\Http\Controllers\API\Auth\AuthController@login');
        Route::post('register', 'App\Http\Controllers\API\Auth\AuthController@register');        
    });
    
    Route::middleware('jwt.auth')->group(function () {
        Route::post('refresh', 'App\Http\Controllers\API\Auth\AuthController@refresh');
        Route::get('me', 'App\Http\Controllers\API\Auth\AuthController@me');
    });

    Route::middleware('jwt.auth', 'checkUserRole:SysAdmin')->group(function () {
        
    });

    Route::middleware('jwt.auth', 'checkUserRole:Admin')->group(function () {
       
    });

    Route::middleware('jwt.auth', 'checkUserRole:Funcionário')->group(function () {
       
    });

    Route::middleware('jwt.auth', 'checkUserRole:Cliente')->group(function () {
        Route::get('cities', 'App\Http\Controllers\API\CityController@index');

        Route::get('branches', 'App\Http\Controllers\API\BranchesController@index');
    });
    

});

Route::fallback(function(){
    return response()->json(['error' => 'Route not found.'], 404);
});