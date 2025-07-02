<?php

namespace App\Jobs;

use App\DTO\ReminderEmail\ReqBookingDto;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendReminderBookingJob implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public ReqBookingDto $data;

    public function __construct(ReqBookingDto $data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        Mail::send('mail-content.reminder-booking', [
            'name' => $this->data->name,
            'surname' => $this->data->surname,
            'travelDate' => $this->data->travelDate,
            'travelName' => $this->data->travelName,
            'pickupTime' => $this->data->pickupTime,
            'optionName' => $this->data->optionName,
            'adult' => $this->data->adult,
            'participants' => $this->data->participants,
            'child' => $this->data->child
        ], function($message) {
            $message->to($this->data->email)
                    ->subject('Your Trip is Coming Soon – 3 Days to Go!');
        });
    }
}