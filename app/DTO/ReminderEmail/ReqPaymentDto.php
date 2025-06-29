<?php
namespace App\DTO\ReminderEmail;

final class ReqPaymentDto {
    public string $name;
    public string $travelDate;
    public string $token;
    public string $travelName;
    public string $email;
    public string $currency;
    public string $amount;

    public function __construct(
        string $name, string $travelDate, string $token, string $travelName, string $email, string $currency, string $amount
    ) {
        $this->name = $name;
        $this->travelDate = $travelDate;
        $this->token = $token;
        $this->travelName = $travelName;
        $this->email = $email;
        $this->currency = $currency;
        $this->amount = $amount;
    }
}