<?php

namespace Modules\Menu\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    /**
     * Defines fields in the database that can be filled
     *
     * @var array $fillable
     */
    protected $fillable = [
        'menu_id',
        'title',
        'slug',
        'url',
        'target',
        'icon',
        'additional_class',
        'color',
        'parent_id',
        'order',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}