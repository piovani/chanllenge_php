<?php

namespace Tests\Unit\User;

use App\Domain\User\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_readable_payment()
    {
        /** @var User $user1 */
        $user1 = User::factory(['type' => User::TYPE_SHOPKEEPER])->make();
        /** @var User $user2 */
        $user2 = User::factory(['type' => User::TYPE_NORMAL])->make();

        $this->assertFalse($user1->readablePayment());
        $this->assertTrue($user2->readablePayment());
    }

    public function test_has_value_in_wallet()
    {
        $value = 10;
        /** @var User $user1 */
        $user1 = User::factory(['wallet' => 0])->make();
        /** @var User $user2 */
        $user2 = User::factory(['wallet' => 20])->make();

        $this->assertFalse($user1->hasValueInWallet($value));
        $this->assertTrue($user2->hasValueInWallet($value));
    }

    public function test_add_value_wallet()
    {
        $value = 10;
        /** @var User $user */
        $user = User::factory(['wallet' => 0])->make();

        $user->addValueWallet($value);

        $this->assertEquals($user->wallet, $value);
    }

    public function test_sub_value_wallet()
    {
        $value = 10;
        /** @var User $user */
        $user = User::factory(['wallet' => 10])->make();

        $user->subValueWallet($value);

        $this->assertEquals($user->wallet, 0);
    }
}
