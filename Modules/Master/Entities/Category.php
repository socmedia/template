<?php

namespace Modules\Master\Entities;

use App\Http\Livewire\Guest\Search\Place;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Master\Traits\Category\Filterable;

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
        'name', 'slug_name', 'pattern', 'table_reference', 'position', 'with_icon', 'icon_class', 'with_image', 'media_path',
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

    protected static function newFactory()
    {
        return \Modules\Master\Database\factories\CategoryFactory::new ();
    }
}