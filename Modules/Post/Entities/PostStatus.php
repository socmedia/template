<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostStatus extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Define fillable column in post status table
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug_name',
    ];

    /**
     * Define post status factory
     *
     * @return void
     */
    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\PostStatusFactory::new ();
    }

    /**
     * Post relation
     *
     * @return void
     */
    public function post()
    {
        return $this->hasMany(Post::class, 'status_id', 'id');
    }
}
