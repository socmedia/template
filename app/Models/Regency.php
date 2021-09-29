<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    use HasFactory;

    public $table = 'id_regencies';

    protected $fillable = [
        'province_id', 'name',
    ];
}