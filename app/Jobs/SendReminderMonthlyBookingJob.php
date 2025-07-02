<?php

namespace App\Jobs;

use App\DTO\ReminderEmail\ReqBookingMonthlyDto;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendReminderMonthlyBookingJob implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public ReqBookingMonthlyDto $data;

    public function __construct(ReqBookingMonthlyDto $data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        $bookings = $this->data->bookings;

        Mail::send('mail-content.reminder-booking-monthly', compact('bookings'), function($message) {
            $message->to('herucod@gmail.com')
                    ->subject('Upcoming Bookings for Next Month!');
        });
    }
}