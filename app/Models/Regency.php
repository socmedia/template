<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    use HasFactory;

    /**
     * Define table name
     *
     * @var string
     */
    public $table = 'id_regencies';

    /**
     * Define fillable columns
     *
     * @var array
     */
    protected $fillable = [
        'province_id', 'name',
    ];
}