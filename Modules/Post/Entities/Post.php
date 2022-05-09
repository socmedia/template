<?php

namespace Modules\Post\Entities;

use App\Contracts\DatabaseTable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Master\Entities\Category;
use Modules\Post\Traits\Post\Filterable;

class Post extends Model
{
    use HasFactory, SoftDeletes, DatabaseTable, Filterable;

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

    /**
     * Default with relation
     *
     * @var array
     */
    protected $with = [
        'category:id,name,slug_name',
        'type:id,name,slug_name',
        'writer:id,name',
    ];

    /**
     * Default with count {count:in_relation}
     *
     * @var array
     */
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
        'type_id',
        'thumbnail',
        'subject',
        'description',
        'tags',
        'reading_time',
        'number_of_views',
        'number_of_shares',
        'author',
        'published_at',
        'archived_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $form = [
        'title' => 'required',
        'slug_title' => 'required',
        'thumbnail' => 'required',
        'category' => 'nullable',
        'type' => 'required',
        'subject' => 'nullable',
        'description' => 'required',
        'tags' => 'nullable',
        'author' => 'required',
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
        return $this->belongsTo(Category::class, 'category_id', 'id');
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
     * Comments relation
     *
     * @return void
     */
    public function comments()
    {
        return $this->hasMany(PostComment::class, 'posts_id', 'id');
    }
}