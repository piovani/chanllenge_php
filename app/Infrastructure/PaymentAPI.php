<?php

namespace App\Infrastructure;

use GuzzleHttp\Client;
use Illuminate\Http\Response;

class PaymentAPI
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'timeout' => 60.0,
            'base_uri' => env('API_VALIDATION_PAYMENT'),
        ]);
    }

    public function vapidation(): bool
    {
        $idFake = '8fafdd68-a090-496f-8c9a-3442cf30dae6';

        try {
            $response = $this->client->get($idFake);

            $statusCode = $response->getStatusCode();
            $body = json_decode($response->getBody()->getContents(), true);

            return $statusCode === Response::HTTP_OK && $body['message'] === 'Autorizado';
        } catch (\Exception $e) {
            return false;
        }
    }
}
