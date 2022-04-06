<?php

namespace Modules\Marketing\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Marketing\Traits\Faq\Filterable;
use Modules\Master\Entities\Category;

class Faq extends Model
{
    use HasFactory, Filterable;

    public $table = 'faqs';

    protected $fillable = [
        'category_id',
        'question',
        'answer',
        'is_show',
        'position',
        'created_at',
        'updated_at',
    ];

    protected static function newFactory()
    {
        return \Modules\Marketing\Database\factories\FaqFactory::new ();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}