<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);

Route::group(['middleware' => 'jwt.verify'], function (){

    Route::resource('datamenu', App\Http\Controllers\MenuController::class);
    Route::get('getmenu', [App\Http\Controllers\MenuController::class, 'getMenu']);
    Route::get('getmenuuser', [App\Http\Controllers\MenuController::class, 'getMenuUser']);
    Route::get('getallmenu', [App\Http\Controllers\MenuController::class, 'getAllMenu']);


    Route::put('otoritasmenu/{id}', [App\Http\Controllers\OtoritasMenuController::class, 'update']);
    Route::get('getrole', [App\Http\Controllers\OtoritasMenuController::class, 'getRole']);
    Route::get('getotoritasrole', [App\Http\Controllers\OtoritasMenuController::class, 'getOtoritasRole']);

    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
});
