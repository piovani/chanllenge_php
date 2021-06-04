<?php

namespace App\Domain\Shared;

use App\Domain\Shared\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domain extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Uuid;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
