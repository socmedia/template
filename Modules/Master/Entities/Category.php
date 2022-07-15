<?php

namespace Modules\Master\Entities;

use App\Http\Livewire\Guest\Search\Place;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Master\Traits\Category\Filterable;
use Modules\Post\Entities\Post;

class Category extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    /**
     * Define table name
     *
     * @var string
     */
    public $table = 'categories';

    protected $fillable = [
        'name',
        'slug_name',
        'pattern',
        'table_reference',
        'position',
        'with_icon',
        'icon_class',
        'with_image',
        'media_path',
        'is_featured',
    ];

    protected $keyType = 'string';

    /**
     * Sub Categories relation
     *
     * @return void
     */
    public function subCategory()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }

    /**
     * Sub Categories relation
     *
     * @return void
     */
    public function place()
    {
        return $this->hasMany(Place::class, 'category_id', 'id');
    }

    /**
     * Sub Categories relation
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }

    /**
     * Sub Categories relation
     *
     * @return void
     */
    public function activePost()
    {
        return $this->posts()->published()->orderBy('published_at', 'desc');
    }

    public function postWithLimit()
    {
        return $this->activePost()->limit(4);
    }

    protected static function newFactory()
    {
        return \Modules\Master\Database\factories\CategoryFactory::new ();
    }
}
