<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\User\Models\Entities\UsersActivity;
use Modules\User\Models\Entities\UsersSetting;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * Define id column in not auto increment
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Define primary key type
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Default fetch with relation
     *
     * @var array
     */
    protected $with = [
        'preferences',
        'province',
        'regency',
        'district',
    ];

    /**
     * Define dates column
     *
     * @var array
     */
    protected $dates = [
        'date_of_birth',
        'approved_at',
        'deactivated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',

        // information
        'place_of_brith',
        'date_of_brith',
        'bio',
        'gender',
        'area_code',
        'phone',
        'province_id',
        'regency_id',
        'district_id',
        'address',

        // settings
        'avatar_url',
        'allow_shares',
        'private_mode',

        // social medias
        'facebook',
        'instagram',
        'linkedin',
        'tiktok',

        // permission
        'approved_at',
        'approved_by',
        'deactivated_reasons',
        'deactivated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * User preferences relation
     *
     * @return void
     */
    public function preferences()
    {
        return $this->hasOne(UsersSetting::class, 'user_id', 'id');
    }

    /**
     * Province relation
     *
     * @return void
     */
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    /**
     * Regency relation
     *
     * @return void
     */
    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id', 'id');
    }

    /**
     * District Relation
     *
     * @return void
     */
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    /**
     * Activities relation
     *
     * @return void
     */
    public function activities()
    {
        return $this->hasMany(UsersActivity::class, 'user_id', 'id');
    }
}