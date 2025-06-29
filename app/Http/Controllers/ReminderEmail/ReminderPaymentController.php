<?php

namespace App\Http\Controllers\ReminderEmail;

use App\DTO\ReminderEmail\ReqPaymentDto;
use App\Http\Controllers\Controller;
use App\Jobs\SendReminderPayment;
use App\Models\Logs;
use Illuminate\Http\Request;

class ReminderPaymentController extends Controller
{
    public function __invoke(Request $request) {
        try {
        $dto = new ReqPaymentDto(
            $request->name,
            $request->travelDate,
            $request->token,
            $request->travelName,
            $request->email,
            $request->currency,
            $request->amount
        );

        SendReminderPayment::dispatch($dto)->delay(now()->addMinute());
        Logs::create([
            'action' => 'sendReminderPayment',
            'message' => 'succesful send email to '.$request->email.'',
            'status' => true
        ]);
        return response()->json(['message' => 'Reminder scheduled']);
        } catch(\Exception $e){
            Logs::create([
                'action' => 'sendReminderPayment',
                'message' => $e->getMessage(),
                'status' => false
            ]);
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
