<?php

namespace Modules\Menu\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * Defines fields in the database that can be filled
     *
     * @var array $fillable
     */
    protected $fillable = [
        'name',
    ];

    public function items()
    {
        return $this->hasMany(MenuItem::class, 'menu_id', 'id');
    }
}