<?php

use Illuminate\Http\Request;
use App\Http\Middleware\JwtMiddleware;

Route::middleware([JwtMiddleware::class])->group(function(){
    Route::resource('kategori', 'KategoriController');
});
