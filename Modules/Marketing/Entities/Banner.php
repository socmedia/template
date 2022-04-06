<?php

namespace Modules\Marketing\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Marketing\Traits\Banner\Filterable;

class Banner extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'banner_type',
        'name',
        'desktop_media_path',
        'mobile_media_path',
        'placement_route',
        'alt',
        'references_url',
        'position',
        'is_active',
        'desktop_background_position',
        'mobile_background_position',
        'with_caption',
        'caption_title',
        'caption_text',
        'with_button',
        'button_text',
        'button_link',
        'created_at',
        'updated_at',
    ];

    protected static function newFactory()
    {
        return \Modules\Marketing\Database\factories\BannerFactory::new ();
    }
}