<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Post\Entities\Post;
use Modules\Post\Traits\FeaturedPost\Filterable;

class FeaturedPost extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'posts_id',
        'created_at',
        'updated_at',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'posts_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\FeaturedPostFactory::new ();
    }
}