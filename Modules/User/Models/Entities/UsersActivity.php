<?php

namespace Modules\User\Models\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UsersActivity extends Model
{
    public $table = 'users_activities';

    public $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'user_id',
        'activity',
        'ip_address',
        'user_agent',
        'country_name',
        'country_code',
        'region_code',
        'region_name',
        'city_name',
        'zip_code',
        'iso_code',
        'postal_code',
        'latitude',
        'longitude',
        'metro_code',
        'area_code',
        'login_at',
        'logout_at',
        'browser',
        'platform',
        'device_type',
        'device',
        'last_activity',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}