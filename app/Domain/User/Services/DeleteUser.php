<?php

namespace App\Domain\User\Services;

use App\Domain\User\User;
use Illuminate\Support\Facades\DB;

class DeleteUser
{
    public function __invoke(User $user): void
    {
        DB::transaction(function() use (&$user) {
            $user->delete();
        });
    }
}
