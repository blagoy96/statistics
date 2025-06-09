<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatisticsController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics');

