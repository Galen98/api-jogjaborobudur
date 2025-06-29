<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Services\Finance\FinanceService;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    protected FinanceService $financeService;

    public function __construct(FinanceService $financeService)
    {
        $this->financeService = $financeService;
    }
    
    public function getDataBooking(Request $request) {
        $token = $request->bearerToken();
        return $this->financeService->getBookingData($token);
    }
    
    public function invoices() {
        
    }
}
