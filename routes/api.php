<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReminderEmail\ReminderBookingController;
use App\Http\Controllers\ReminderEmail\ReminderPaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//email
Route::group(['prefix' => 'email'], function () {
    Route::post('reminder-payment', ReminderPaymentController::class);
    Route::get('reminder-booking-date', ReminderBookingController::class);
});

Route::group(['prefix' => 'v1'], function() {
    Route::get('log-application', [HomeController::class, 'logApplication']);
});

include 'finance.php';
