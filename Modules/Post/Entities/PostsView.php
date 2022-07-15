<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsView extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'posts_id',
        'last_open_at',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'last_open_at',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'posts_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\PostsViewFactory::new ();
    }
}