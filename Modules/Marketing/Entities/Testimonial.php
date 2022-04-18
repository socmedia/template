<?php

namespace Modules\Marketing\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Marketing\Traits\Testimonial\Filterable;

class Testimonial extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name',
        'media_path',
        'review',
        'is_active',
        'position',
        'created_at',
        'updated_at',
    ];

    protected static function newFactory()
    {
        return \Modules\Marketing\Database\factories\TestimonialFactory::new ();
    }
}