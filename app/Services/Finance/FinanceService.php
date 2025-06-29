<?php

namespace App\Services\Finance;

use App\DTO\Finance\ResDataBookingDto;
use App\Enums\Endpoints;
use App\Services\BaseService;
use Exception;
use GuzzleHttp\Psr7\Request;

class FinanceService extends BaseService {

    public function getBookingData($token) {
        try {
            $identifier = Endpoints::BASE_V1;
            if($token == null) {
                $token = '';
            }
            $res = self::get(identifierendpoint: $identifier, token: $token)->get('/data-booking');
            $result = $res->json();
            self::insertLogging('getBookingData', 'Success get data', true);

            $dto = $dto = array_map(function ($data) {
                return new ResDataBookingDto(
                    $data['id'],
                    $data['name'],
                    $data['surname'],
                    $data['code'],
                    $data['country'],
                    $data['phone'],
                    $data['paketwisata'],
                    $data['email'],
                    $data['total'],
                    $data['totalgroup'],
                    $data['traveldate'],
                    $data['adult'],
                    $data['child'],
                    $data['participants'],
                    $data['time'],
                    $data['request'],
                    $data['pickup'],
                    $data['namawisata'],
                    $data['currency'],
                    $data['amount'],
                    $data['created_at'],
                    $data['updated_at']
                );
            }, $result['DATA']);            

            return response()->json([
                'STATUS' => 200,
                'MESSAGE' => 'success',
                'DATA' => $dto
            ]);
        } catch(Exception $e) {
            self::insertLogging('getBookingData', $e->getMessage(), false);
            return response()->json([
            'STATUS' => 500,
            'MESSAGE' => $e->getMessage()]);
        } 
    }
}