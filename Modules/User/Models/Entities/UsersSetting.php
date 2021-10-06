<?php

namespace Modules\User\Models\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UsersSetting extends Model
{
    public $table = 'users_settings';

    protected $fillable = [
        'user_id',
        'lang',
        'general_theme',
        'navbar_theme',
        'sidebar_theme',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}