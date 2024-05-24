<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\TransactionController;

Route::post('/transaction', [TransactionController::class, 'handleTransaction']);
Route::post('/email', [TransactionController::class, 'handleEmail']);
