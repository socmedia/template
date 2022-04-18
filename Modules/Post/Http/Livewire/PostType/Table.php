<?php

namespace Modules\Post\Http\Livewire\PostType;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Post\Entities\PostType;
use Modules\Post\Services\PostType\PostTypeQuery;
use Modules\Post\Services\PostType\TableConfig;
use Modules\Post\Services\PostType\TableFilterActions;

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
     * Define table headers
     *
     * @var array
     */
    public $headers = [
        [
            'cell_name' => 'Nama Jenis',
            'column_name' => 'name',
            'sortable' => true,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Slug',
            'column_name' => 'slug_name',
            'sortable' => true,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Kolom',
            'column_name' => null,
            'sortable' => false,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Aksi',
            'column_name' => null,
            'sortable' => false,
            'order' => null,
            'additional_class' => null,
        ],
    ];

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
        return (new PostTypeQuery())->filters((object) [
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
        $post = PostType::where('id', $this->destroyId)->withTrashed()->first();

        // Force delete
        $post->delete();

        Cache::forget('post_types');

        $types = PostType::all(['name', 'slug_name']);
        Cache::forever('post_types', $types);

        return session()->flash('success', 'Jenis postingan berhasil dihapus.');
    }

    public function render()
    {
        return view('post::livewire.post-type.table', [
            'types' => $this->getAll(),
        ]);
    }
}