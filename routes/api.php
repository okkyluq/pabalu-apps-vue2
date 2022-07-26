<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);

Route::group(['middleware' => 'jwt.verify'], function (){

    // Route::resource('datamenu', App\Http\Controllers\API\MenuController::class);
    // Route::get('getmenu', [App\Http\Controllers\API\MenuController::class, 'getMenu']);
    // Route::get('getmenuuser', [App\Http\Controllers\API\MenuController::class, 'getMenuUser']);
    // Route::get('getallmenu', [App\Http\Controllers\API\MenuController::class, 'getAllMenu']);


    // Route::put('otoritasmenu/{id}', [App\Http\Controllers\API\OtoritasMenuController::class, 'update']);
    // Route::get('getrole', [App\Http\Controllers\API\OtoritasMenuController::class, 'getRole']);
    // Route::get('getotoritasrole', [App\Http\Controllers\API\OtoritasMenuController::class, 'getOtoritasRole']);

    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
});
