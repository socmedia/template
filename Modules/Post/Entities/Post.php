<?php

namespace Modules\Post\Entities;

use App\Contracts\DatabaseTable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Post\Services\PostQueriesService;

class Post extends Model
{
    use HasFactory, SoftDeletes, DatabaseTable, PostQueriesService;

    /**
     * Define table name
     *
     * @var string
     */
    public $table = 'posts';

    /**
     * Define this table is not using auto_increment
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Define id data type is a string
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Cast post id
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
    ];

    protected $with = [
        'category:id,name',
        'thumbnail:id,posts_id,media_thumbnail,media_path',
        'status:id,name',
        'type:id,name',
        'writer:id,name',
    ];

    protected $withCount = [
        'comments',
    ];

    /**
     * Define fillable column in the post table
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'slug_title',
        'category_id',
        'status_id',
        'type_id',
        'subject',
        'description',
        'tags',
        'reading_time',
        'number_of_views',
        'number_of_shares',
        'author',
    ];

    /**
     * Define for post factory
     *
     * @return void
     */
    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\PostFactory::new ();
    }

    /**
     * Category relation
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id', 'id');
    }

    /**
     * Status relation
     *
     * @return void
     */
    public function status()
    {
        return $this->belongsTo(PostStatus::class, 'status_id', 'id');
    }

    /**
     * Type relation
     *
     * @return void
     */
    public function type()
    {
        return $this->belongsTo(PostType::class, 'type_id', 'id');
    }

    /**
     * Author relation
     *
     * @return void
     */
    public function writer()
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }

    /**
     * Medias relation
     *
     * @return void
     */
    public function medias()
    {
        return $this->hasMany(PostMedia::class, 'posts_id', 'id');
    }

    /**
     * Thumbnail
     *
     * @return void
     */
    public function thumbnail()
    {
        return $this->hasOne(PostMedia::class, 'posts_id', 'id')->where('type', 'thumbnail');
    }

    /**
     * Comments relation
     *
     * @return void
     */
    public function comments()
    {
        return $this->hasMany(PostComment::class, 'posts_id', 'id');
    }
}