<?php

namespace App\Infrastructure;

use App\Domain\User\User;
use GuzzleHttp\Client;

class NotificationAPI
{
    private $client;

    public function __construct()
    {
        $this->client = new Client(
            [
                'timeout' => 60.0,
                'base_uri' => env('API_NOTIFICATION'),
            ]
        );
    }

    public function notification(User $user, bool $sms = true, bool $email = true): void
    {
        if ($sms) {
            $this->notificationSms($user);
        }

        if ($email) {
            $this->notificationEmail($user);
        }
    }

    private function notificationSms(User $user): void
    {
        $this->client->get('notify');
    }

    private function notificationEmail(User $user): void
    {
        $this->client->get('notify');
    }

}
