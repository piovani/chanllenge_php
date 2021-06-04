<?php

namespace App\Domain\Shared;

use Ramsey\Uuid\Uuid as BaseUuid;

trait Uuid
{
    public static function bootUuid()
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = BaseUuid::uuid4()->toString();
            }
        });
    }
}
