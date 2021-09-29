<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    public $table = 'id_villages';

    protected $fillable = [
        'district_id', 'name',
    ];
}