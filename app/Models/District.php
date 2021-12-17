<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    /**
     * Define table name
     *
     * @var string
     */
    public $table = 'id_districts';

    /**
     * Define fillable column
     *
     * @var array
     */
    protected $fillable = [
        'regency_id', 'name',
    ];
}