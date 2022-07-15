<?php

namespace Modules\Post\Http\Livewire\FeaturedPost;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Post\Entities\FeaturedPost;
use Modules\Post\Services\FeaturedPost\FeaturedPostQuery;
use Modules\Post\Services\FeaturedPost\TableConfig;
use Modules\Post\Services\FeaturedPost\TableFilterActions;

class Table extends Component
{
    use WithPagination, TableConfig, TableFilterActions;

    /**
     * Define query string props
     *
     * @var string
     */
    public $sort = 'created_at', $order = 'desc', $search, $destroyId, $perPage = 10;

    /**
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount()
    {
        $this->mountDefaultValues();
    }

    /**
     * Define livewire query string
     *
     * @var array
     */
    protected $queryString = [
        'sort',
        'order',
        'search',
    ];

    /**
     * Get all posts from database
     *
     * @return void
     */
    public function getAll()
    {
        return (new FeaturedPostQuery())->filters((object) [
            'sort' => $this->sort,
            'order' => $this->order,
            'search' => $this->search,
        ], $this->perPage);
    }

    /**
     * Destroy post from database
     *
     * @return void
     */
    public function destroy()
    {
        $post = FeaturedPost::find($this->destroyId);

        if ($post) {
            $post->delete();
            return session()->flash('success', 'Postingan unggulan berhasil dihapus.');
        }

        return session()->flash('failed', 'Postingan unggulan tidak ditemukan.');
    }

    public function render()
    {
        return view('post::livewire.featured-post.table', [
            'featuredPosts' => $this->getAll(),
        ]);
    }
}