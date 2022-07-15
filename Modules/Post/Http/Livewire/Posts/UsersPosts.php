<?php

namespace Modules\Post\Http\Livewire\Posts;

use Livewire\Component;
use Modules\Master\Entities\Category;
use Modules\Master\Entities\SubCategory;
use Modules\Master\Services\Category\CategoryQuery;
use Modules\Post\Services\Post\PostQuery;

class UsersPosts extends Component
{
    public $user_id, $withDate;
    public $kanal, $sub_kanal, $dari, $hingga, $keyword;
    public $perPage = 10;

    protected $queryString = [
        'kanal', 'sub_kanal', 'dari', 'hingga', 'keyword',
    ];

    public function mount($user_id = null, $withDate = false)
    {
        $this->user_id = $user_id;
        $this->kanal = request()->get('kanal');
        $this->sub_kanal = request()->get('sub_kanal');
        $this->keyword = request()->get('keyword');

        if ($withDate) {
            $this->dari = request()->get('dari');
            $this->hingga = request()->get('hingga') ?: now()->toDateString();
        }
    }

    public function updated($component, $value)
    {
        if (!$value) {

            if ($component == 'kanal') {
                $this->reset('sub_kanal');
            }

            $this->reset($component);
        }
    }

    public function getAll()
    {
        return (new PostQuery())->publicPosts((object) [
            'author' => $this->user_id,
            'category' => $this->kanal,
            'subCategory' => $this->sub_kanal,
            'search' => $this->keyword,
            'date_start' => $this->dari,
            'date_end' => $this->hingga,
        ], $this->perPage);
    }

    public function getAllCategories()
    {
        return (new CategoryQuery())->getByTableReference('posts.berita');
    }

    public function getAllSubCategories()
    {
        $category = Category::where('slug_name', $this->kanal)->first();

        if ($this->kanal) {
            return SubCategory::where('category_id', $category->id)->get();
        }

        return SubCategory::where('category_id', null)->get();
    }

    public function loadMore()
    {
        return $this->perPage += 6;
    }

    public function render()
    {
        return view('post::livewire.posts.users-posts', [
            'posts' => $this->getAll(),
            'categories' => $this->getAllCategories(),
            'subCategories' => $this->getAllSubCategories(),
        ]);
    }
}