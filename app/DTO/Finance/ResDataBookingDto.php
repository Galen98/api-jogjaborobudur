<?php

namespace App\DTO\Finance;

use Carbon\Carbon;

class ResDataBookingDto {
    public function __construct (
        public int $id,
        public ?string $name,
        public ?string $surname,
        public ?string $code,
        public ?string $country,
        public ?string $phone,
        public ?string $paketwisata,
        public ?string $email,
        public ?string $total,
        public ?string $totalgroup,
        public ?string $traveldate,
        public ?int $adult,
        public ?int $child,
        public ?int $participants,
        public ?string $time,
        public ?string $request,
        public ?string $pickup,
        public ?string $namawisata,
        public ?string $currency,
        public ?int $amount,
        public ?string $created_at,
        public ?string $updated_at
    ) {
        $this->traveldate = Carbon::createFromFormat('d/m/Y', $this->traveldate)->format('Y-m-d');
        $this->created_at = Carbon::parse($this->created_at)->format('Y-m-d');
        $this->updated_at = Carbon::parse($this->updated_at)->format('Y-m-d');
    }
}