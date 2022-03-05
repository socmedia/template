<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostMedia extends Model
{
    use HasFactory;

    /**
     * Define fillable column in the post medias table
     *
     * @var array
     */
    protected $fillable = [
        'posts_id', 'type', 'media_type', 'media_thumbnail', 'media_path', 'media_source',
    ];

    /**
     * Define table name
     *
     * @var string
     */
    public $table = 'post_medias';

    /**
     * Define post medias factory
     *
     * @return void
     */
    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\PostMediaFactory::new ();
    }

    /**
     * Post relation
     *
     * @return void
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'posts_id', 'id');
    }
}