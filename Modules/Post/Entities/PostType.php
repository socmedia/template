<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Post\Traits\PostType\Filterable;

class PostType extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    /**
     * Define fillable column in the post type table
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug_name', 'allow_column', 'created_at', 'updated_at',
    ];

    /**
     * Define post type factory
     *
     * @return void
     */
    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\PostTypeFactory::new ();
    }

    /**
     * Post relation
     *
     * @return void
     */
    public function post()
    {
        return $this->hasMany(Post::class, 'type_id', 'id');
    }
}