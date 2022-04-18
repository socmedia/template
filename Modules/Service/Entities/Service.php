<?php

namespace Modules\Service\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Service\Traits\Service\Filterable;

class Service extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name',
        'slug_name',
        'position',
        'thumbnail',
        'description',
        'duration',
        'terms_n_conditions',
        'created_at',
        'updated_at',
    ];

    protected static function newFactory()
    {
        return \Modules\Service\Database\factories\ServiceFactory::new ();
    }
}