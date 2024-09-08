<?php

use App\Contracts\DrinkControllerInterface;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/drink', [DrinkControllerInterface::class, 'drink']);
