<?php

namespace Modules\Marketing\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Marketing\Traits\Client\Filterable;

class Client extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name',
        'media_path',
        'is_active',
        'position',
        'created_at',
        'updated_at',
    ];

    protected static function newFactory()
    {
        return \Modules\Marketing\Database\factories\ClientFactory::new ();
    }
}