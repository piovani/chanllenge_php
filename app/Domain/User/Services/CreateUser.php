<?php

namespace App\Domain\User\Services;

use App\Domain\User\User;
use Illuminate\Support\Facades\DB;

class CreateUser
{
    use UserTrait;

    public function __invoke(array $data):? User
    {
        $user = null;

        DB::transaction(function() use ($data, &$user) {
            $user = new User();
            $user = $this->setFields($user, $data);
            $user->password = bcrypt($data['password']);

            $user->save();
        });

        return $user;
    }
}
