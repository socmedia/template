<?php

namespace Modules\Front\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    use HasFactory;

    protected $fillable = [
        'keywords',
        'total',
        'last_search_at',
        'created_at',
        'updated_at',
    ];

    protected static function newFactory()
    {
        return \Modules\Front\Database\factories\SearchFactory::new ();
    }
}