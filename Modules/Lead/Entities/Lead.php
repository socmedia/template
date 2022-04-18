<?php

namespace Modules\Lead\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Lead\Traits\Lead\Filterable;

class Lead extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'category_id',
        'name',
        'phone',
        'email',
        'address',
        'question',
        'status',
        'is_readed',
        'cerated_at',
        'updated_at',
    ];
}