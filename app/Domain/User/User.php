<?php

namespace App\Domain\User;

use App\Domain\Shared\Domain;

class User extends Domain
{
    protected $fillable = [
        'full_name',
        'document',
        'email',
        'password',
    ];
}
