<?php

namespace App\Jobs;

use App\DTO\ReminderEmail\ReqPaymentDto;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendReminderPayment implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public ReqPaymentDto $data;
    
    public function __construct(ReqPaymentDto $data) {
        $this->data = $data;
    }

    public function handle()
    {
        $data = $this->data;

        $bodymail = [
        'name' => $data->name,
        'travelDate' => $data->travelDate,
        'token' => $data->token,
        'travelName' => $data->travelName,
        'currency' => $data->currency,
        'amount' => $data->amount
        ];

        Mail::send('mail-content.reminder-payment', $bodymail, function($message) use ($data) {
            $message->to($data->email)
                    ->subject('Friendly Reminder: Complete Your Payment for Your Upcoming Trip!'); 
        }); 
    }
}