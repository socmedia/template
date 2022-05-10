<?php

namespace Modules\Documentation\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    use HasFactory;

    /**
     * Declare this table is not auto increment
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Define key type
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Define fillable column
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'parent_id',
        'page_title',
        'slug_page_title',
        'position',
        'content',
        'published_at',
        'created_at',
        'updated_at',
    ];

    /**
     * Define parent relation
     *
     * @return void
     */
    public function parent()
    {
        return $this->belongsTo(Documentation::class, 'parent_id', 'id');
    }
}