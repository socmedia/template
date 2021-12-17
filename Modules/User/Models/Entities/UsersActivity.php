<?php

namespace Modules\User\Models\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UsersActivity extends Model
{
    /**
     * Define table name
     *
     * @var string
     */
    public $table = 'users_activities';

    /**
     * Define primary key type is equal to string
     *
     * @var string
     */
    public $keyType = 'string';

    /**
     * Define created_at and updated_at are not available in user_activities table
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * fDefine illable columns
     *
     * @var array
     */
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