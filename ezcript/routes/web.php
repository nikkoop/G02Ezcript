<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('cambio');
});

Route::get('/caso', function () {
    return view('app');
});
