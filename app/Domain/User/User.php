<?php

namespace App\Domain\User;

use App\Domain\Shared\Domain;
use Carbon\Carbon;

/**
 * Class User
 * @package App\Domain\User
 *
 * @property string $id
 * @property string $full_name
 * @property string $document
 * @property string $email
 * @property string $password
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property string $type
 * @property float $wallet
 */
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

    public function readablePayment(): bool
    {
        if ($this->type === self::TYPE_SHOPKEEPER) {
            return false;
        }

        return true;
    }

    public function hasValueInWallet(float $value): bool
    {
        if ($this->wallet < $value) {
            return false;
        }

        return true;
    }

    public function addValueWallet(float $value): void
    {
        $this->wallet += $value;
        $this->save();
    }

    public function subValueWallet(float $value): void
    {
        $this->wallet -= $value;
        $this->save();
    }
}
