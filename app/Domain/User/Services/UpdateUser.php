<?php

namespace App\Domain\User\Services;

use App\Domain\User\User;
use Illuminate\Support\Facades\DB;

class UpdateUser
{
    use UserTrait;

    public function __invoke(User $user, array $data): User
    {
        DB::transaction(function() use ($data, &$user) {
            $user = $this->setFields($user, $data);

            $user->save();
        });

        return $user;
    }
}
