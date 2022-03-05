<?php

namespace Modules\Post\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    /**
     * Define this table is not using auto_increment
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Define fillable column in the post comment table
     *
     * @var array
     */
    protected $fillable = [
        'id', 'posts_id', 'user_id', 'name', 'email', 'number_of_likes', 'comment',
    ];

    protected $with = [
        'commenter:id,name,avatar_url',
    ];

    /**
     * Define post comments factory
     *
     * @return void
     */
    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\PostCommentFactory::new ();
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

    /**
     * User relation
     *
     * @return void
     */
    public function commenter()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}