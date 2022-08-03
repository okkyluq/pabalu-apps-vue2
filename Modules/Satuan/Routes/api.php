<?php

use Illuminate\Http\Request;
use App\Http\Middleware\JwtMiddleware;
// use Modules\Satuan\Http\Controllers\SatuanController;




Route::middleware([JwtMiddleware::class])->group(function(){
    Route::resource('satuan', 'SatuanController');
});
