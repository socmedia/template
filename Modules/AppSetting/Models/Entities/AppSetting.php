<?php

namespace Modules\AppSetting\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
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
    ];
}