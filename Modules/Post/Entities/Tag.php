<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Post\Traits\Tag\Filterable;

class Tag extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name',
        'slug_name',
        'is_featured',
        'hot_topic',
        'created_at',
        'updated_at',
    ];

    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\TagFactory::new ();
    }
}
