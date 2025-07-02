<?php
namespace App\DTO\ReminderEmail;

final class BookingDetailDto {
    public function __construct(
        public ?int $id,
        public ?string $name,
        public ?string $surname,
        public ?string $travelDate,
        public ?string $travelName,
        public ?string $optionName,
        public ?string $total,
        public ?string $pickupTime,
        public ?string $specialReq,
        public ?string $email
    ) {}
}
