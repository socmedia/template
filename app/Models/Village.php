<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    /**
     * Define table name
     *
     * @var string
     */
    public $table = 'id_villages';

    /**
     * Define fillable columns
     *
     * @var array
     */
    protected $fillable = [
        'district_id', 'name',
    ];
}