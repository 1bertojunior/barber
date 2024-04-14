<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::get('test', 'App\Http\Controllers\API\TestController@v1');

    Route::prefix('auth')->group(function () {
        Route::get('test', 'App\Http\Controllers\API\TestController@v1');
        Route::post('login', 'App\Http\Controllers\API\Auth\AuthController@login');
        Route::post('register', 'App\Http\Controllers\API\Auth\AuthController@register');
    });

    Route::get('cities', 'App\Http\Controllers\API\CityController@index');

    Route::middleware('role.type:SysAdmin')->group( function (){
    });

    Route::middleware('role.type:Admin')->group( function (){
            
    });

    Route::middleware('role.type:Funcionário')->group( function (){
        
    });

    Route::middleware('role.type:Cliente')->group( function (){
        
        
    });

});