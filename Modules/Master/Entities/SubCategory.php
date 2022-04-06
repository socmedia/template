<?php

namespace Modules\Master\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Master\Traits\SubCategory\Filterable;
use Modules\Place\Entities\Place;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    /**
     * Define table name
     *
     * @var string
     */
    public $table = 'sub_categories';

    protected $fillable = [
        'category_id', 'name', 'slug_name', 'parent', 'position', 'with_icon', 'icon_class', 'with_image', 'media_path',
    ];

    protected $keyType = 'string';

    /**
     * Categories relation
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function places()
    {
        return $this->hasMany(Place::class, 'sub_category_id', 'id');
    }

    public function subCategoryParent()
    {
        return $this->belongsTo(SubCategory::class, 'parent', 'id');
    }

    public function childs()
    {
        return $this->hasMany(SubCategory::class, 'parent', 'id')->orderBy('position', 'asc');
    }

    protected static function newFactory()
    {
        return \Modules\Master\Database\factories\SubCategoryFactory::new ();
    }
}