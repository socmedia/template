<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Define fillable column in the post category table
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug_name',
    ];

    /**
     * Define post category factory
     *
     * @return void
     */
    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\PostCategoryFactory::new ();
    }

    /**
     * Post relation
     *
     * @return void
     */
    public function post()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
