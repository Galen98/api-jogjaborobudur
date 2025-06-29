<?php

namespace App\Services;

use App\Models\Logs;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class BaseService {
    public static function get(string $identifierendpoint, string $token): PendingRequest
    {
        return Http::baseUrl(config($identifierendpoint))
            ->withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ]);
    }

    public static function insertLogging(string $action, string $message, bool $status) {
        Logs::create([
            'action' => $action,
            'message' => $message,
            'status' => $status
        ]);
    }
}