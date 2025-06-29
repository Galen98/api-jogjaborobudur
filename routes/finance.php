<?php

use App\Http\Controllers\Finance\FinanceController;
use App\Http\Middleware\VerifyApiToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'finance', 'middleware' => 'verify.api.token'], function () {
    Route::get('/get-data-booking', [FinanceController::class, 'getDataBooking']);
});