<?php
namespace App\Http\Controllers\ReminderEmail;

use App\DTO\ReminderEmail\BookingDetailDto;
use App\DTO\ReminderEmail\ReqBookingMonthlyDto;
use App\Http\Controllers\Controller;
use App\Jobs\SendReminderMonthlyBookingJob;
use App\Services\Finance\FinanceService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class ReminderBookingMonthlyController extends Controller {
    protected FinanceService $financeService;

    public function __construct(FinanceService $financeService)
    {
        $this->financeService = $financeService;
    }

    public function __invoke()
    {
        try {
            $token = '2bb80d537b1da3e38bd30361aa855686bde0eacd7162fef6a25fe97bf527a25b';
            $response = $this->financeService->getBookingData($token);
            $responseArray = $response->getData(true);
            $bookings = $responseArray['DATA'] ?? [];
            $nextMonth = Carbon::now()->addMonth()->format('Y-m');

            $filtered = array_filter($bookings, function ($booking) use ($nextMonth) {
                try {
                    if (!isset($booking['traveldate'])) return false;
                    $date = \Carbon\Carbon::parse($booking['traveldate']);
                    return $date->format('Y-m') === $nextMonth;
                } catch (\Exception $e) {
                    logger()->warning("Invalid traveldate: " . $booking['traveldate']);
                    return false;
                }
            });            

            $dtos = array_map(fn ($booking) => new BookingDetailDto(
                id: $booking['id'],
                name: $booking['name'],
                surname: $booking['surname'] ?? null,
                travelDate: $booking['traveldate'],
                travelName: $booking['namawisata'],
                optionName: $booking['paketwisata'],
                total: $booking['total'],
                pickupTime: $booking['time'],
                specialReq: $booking['request'],
                email: $booking['email']
            ), $filtered);
            $dto = new ReqBookingMonthlyDto($dtos);
            SendReminderMonthlyBookingJob::dispatch($dto);
            $this->financeService->insertLogging('ReminderBookingMonthly', 'Success send email to herucod@gmail.com', true);

        } catch(Exception $e) {
            $this->financeService->insertLogging('ReminderBookingMonthly', $e->getMessage() , false);
        }
    }
}