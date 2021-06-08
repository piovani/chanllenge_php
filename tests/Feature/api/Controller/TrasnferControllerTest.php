<?php

namespace Tests\Feature\api\Controller;

use App\Domain\User\User;
use Tests\TestCase;

class TrasnferControllerTest extends TestCase
{
    public function test_route_transfer()
    {
        /** @var float $value */
        $value = 10;

        /** @var User $payer */
        $payer = User::factory(['type' => User::TYPE_NORMAL, 'wallet' => (float) $value])->create();

        /** @var User $payee */
        $payee = User::factory()->create();

        $body = [
            'value' => $value,
            'payer' => $payer->id,
            'payee' => $payee->id,
        ];

        $response = $this->post('api/transfer', $body)->assertStatus(200);
        $body = json_decode($response->getContent(), true);
        $this->assertTrue($body['operation']);
    }
}
