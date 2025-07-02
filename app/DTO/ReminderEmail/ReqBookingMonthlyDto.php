<?php

namespace App\DTO\ReminderEmail;

final class ReqBookingMonthlyDto {
   /**
     * @var BookingDetailDto[]
     */
    public array $bookings;

    public function __construct(array $bookings)
    {
        $this->bookings = $bookings;
    }
}