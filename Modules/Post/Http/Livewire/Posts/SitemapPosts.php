<?php

namespace Modules\Post\Http\Livewire\Posts;

use Livewire\Component;
use Modules\Master\Entities\Category;
use Modules\Master\Services\Category\CategoryQuery;
use Modules\Post\Services\Post\PostQuery;

class SitemapPosts extends Component
{
    public $user_id;
    public $kanal, $sub_kanal, $keyword;
    public $perPage = 10;

    protected $queryString = [
        'kanal', 'sub_kanal', 'keyword',
    ];

    public function mount($user_id = null, $withDate = false)
    {
        $this->user_id = $user_id;
        $this->kanal = (new CategoryQuery())->getByTableReference('posts.berita')->first()->slug_name;
        $this->sub_kanal = request()->get('sub_kanal');
        $this->keyword = request()->get('keyword');

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

    public function category($value)
    {
        $this->kanal = $value;
        $this->sub_kanal = null;
    }

    public function subCategory($value)
    {
        $this->sub_kanal = $value;
    }

    public function getAll()
    {
        return (new PostQuery())->publicPosts((object) [
            'author' => $this->user_id,
            'category' => $this->kanal,
            'subCategory' => $this->sub_kanal,
            'search' => $this->keyword,
        ], $this->perPage);
    }

    public function getAllCategories()
    {
        return (new CategoryQuery())->getByTableReference('posts.berita');
    }

    public function loadMore()
    {
        return $this->perPage += 6;
    }

    public function render()
    {
        return view('post::livewire.posts.sitemap-posts', [
            'posts' => $this->getAll(),
            'categories' => $this->getAllCategories(),
        ]);
    }
}
