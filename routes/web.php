<?php

use App\Http\Controllers\CocaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/drink', [CocaController::class, 'drink']);
