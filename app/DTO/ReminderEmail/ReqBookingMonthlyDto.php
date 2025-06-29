<?php

namespace App\DTO\ReminderEmail;

final class ReqBookingMonthlyDto {
    public ?string $name;
    public ?string $surname;
    public ?string $travelDate;
    public ?string $travelName;
    public ?string $optionName;
    public ?string $total;
    public ?string $pickupTime;
    public ?string $specialReq;
    public ?string $email;
    public ?int $participants;
    public ?int $adult;
    public ?int $child;
    public function __construct(
        ?string $name,
        ?string $surname,
        ?string $travelDate,
        ?string $travelName,
        ?string $optionName,
        ?string $total,
        ?string $pickupTime,
        ?string $specialReq,
        ?string $email,
        ?int $participants,
        ?int $adult,
        ?int $child
    ) {
       $this->name = $name;
       $this->surname = $surname;
       $this->travelDate = $travelDate;
       $this->travelName = $travelName;
       $this->optionName = $optionName;
       $this->total = $total;
       $this->pickupTime = $pickupTime;
       $this->specialReq = $specialReq;
       $this->email = $email;
       $this->participants = $participants;
       $this->adult = $adult;
       $this->child = $child; 
    }
}