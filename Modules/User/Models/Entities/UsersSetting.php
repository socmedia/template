<?php

namespace Modules\User\Models\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UsersSetting extends Model
{
    /**
     * Define table name
     *
     * @var string
     */
    public $table = 'users_settings';

    /**
     * Define fillable columns
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'lang',
        'general_theme',
        'navbar_theme',
        'sidebar_theme',
    ];

    /**
     * Users relation
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}