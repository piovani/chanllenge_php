<?php

namespace App\Domain\User\Services;

use App\Domain\User\User;

trait UserTrait
{
    public function setFields(User $user, array $data): User
    {
        $user->full_name = $data['full_name'];
        $user->document = $data['document'];
        $user->email = $data['email'];

        return $user;
    }
}