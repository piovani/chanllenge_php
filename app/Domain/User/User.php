<?php

namespace App\Domain\User;

use App\Domain\Shared\Domain;

class User extends Domain
{
    const TYPES = [
        self::TYPE_NORMAL,
        self::TYPE_SHOPKEEPER,
    ];

    const TYPE_NORMAL = 'NORMAL';
    const TYPE_SHOPKEEPER = 'shopkeeper';

    protected $fillable = [
        'full_name',
        'document',
        'email',
        'password',
        'type',
        'wallet',
    ];
}
