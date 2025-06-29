<?php
namespace App\Http\Controllers\ReminderEmail;

use App\DTO\ReminderEmail\ReqBookingDto;
use App\Http\Controllers\Controller;
use App\Jobs\SendReminderBookingJob;
use App\Services\Finance\FinanceService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class ReminderBookingController extends Controller {
    protected FinanceService $financeService;

    public function __construct(FinanceService $financeService)
    {
        $this->financeService = $financeService;
    }

    public function __invoke(Request $request) {
        try { 
        $token = '2bb80d537b1da3e38bd30361aa855686bde0eacd7162fef6a25fe97bf527a25b';
        $response = $this->financeService->getBookingData($token);
        $responseArray = $response->getData(true);
        $bookings = $responseArray['DATA'] ?? [];
        
        foreach ($bookings as $booking) {
            if (
                isset($booking['traveldate']) &&
                Carbon::parse($booking['traveldate'])->isSameDay(Carbon::now()->addDays(3))
            ) {
                $dto = new ReqBookingDto(
                    name: $booking['name'],
                    surname: $booking['surname'],
                    travelDate: $booking['traveldate'],
                    travelName: $booking['namawisata'],
                    optionName: $booking['paketwisata'],
                    total: $booking['total'],
                    pickupTime: $booking['time'],
                    specialReq: $booking['request'],
                    email: $booking['email'],
                    participants: $booking['participants'],
                    adult: $booking['adult'],
                    child: $booking['child']
                );
                SendReminderBookingJob::dispatch($dto);
                $this->financeService->insertLogging('ReminderBookingDate', 'Success send email to '. $booking['email'], true);
            }
        }
    } catch(Exception $e) {
        $this->financeService->insertLogging('ReminderBookingDate', $e->getMessage() , false);
    }
        
    }
}