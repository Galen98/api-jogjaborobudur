<?php

use App\Http\Controllers\ReminderEmail\ReminderPaymentController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;


//test redis
Route::get('/', function () {
    return view('welcome');
});
