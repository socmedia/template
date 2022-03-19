<?php

namespace Modules\AppSetting\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\AppSetting\Traits\Filterable;

class AppSetting extends Model
{
    use Filterable;

    /**
     * Define table name
     *
     * @var string
     */
    public $table = 'app_settings';

    /**
     * Define fillable columns
     *
     * @var array
     */
    protected $fillable = [
        'group',
        'key',
        'value',
        'type',
        'form_type',
        'created_at',
        'updated_at',
    ];
}