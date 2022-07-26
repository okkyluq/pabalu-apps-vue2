<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('index'); });
Route::any('/{sluq}', function(){ return view('index'); });
