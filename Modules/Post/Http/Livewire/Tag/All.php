<?php

namespace Modules\Post\Http\Livewire\Tag;

use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Post\Entities\Tag;
use Modules\Post\Services\Tag\TableConfig;
use Modules\Post\Services\Tag\TableFilterActions;
use Modules\Post\Services\Tag\TagQuery;

class All extends Component
{
    use WithPagination, TableConfig, TableFilterActions;

    /**
     * Define query string props
     *
     * @var string
     */
    public $tag,
    $name,
    $slug_name,
    $sort = 'created_at',
    $order = 'desc',
    $search,
    $destroyId,
    $tagId,
    $perPage = 10,
    $mode = 'create',
    $is_featured = 0,
    $hot_topic = 0;

    /**
     * Define table headers
     *
     * @var array
     */
    public $headers = [
        [
            'cell_name' => 'Nama Tag',
            'column_name' => 'name',
            'sortable' => true,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Slug Name',
            'column_name' => 'slug_name',
            'sortable' => true,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Tgl. Dibuat',
            'column_name' => 'created_at',
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
     * Define sorts property
     *
     * @var array
     */
    public $sorts = [
        [
            'label' => 'Nama',
            'column' => 'name',
        ],
        [
            'label' => 'Dibuat Pada',
            'column' => 'created_at',
        ],
    ];

    /**
     * Define validation rules
     *
     * @return void
     */
    protected function rules()
    {
        return [
            'name' => 'required|min:3|max:199|unique:tags,name,' . $this->tagId,
        ];
    }

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
     * Update tag in database
     *
     * @return void
     */
    public function update($id)
    {
        $tag = Tag::find($id);

        if ($tag) {
            $this->name = $tag->name;
            $this->is_featured = $tag->is_featured;
            $this->hot_topic = $tag->hot_topic;
            $this->tagId = $tag->id;
            return $this->mode = 'edit';
        }

        return session()->flash('failed', 'Tag tidak ditemukan.');
    }

    /**
     * Store tag to database
     *
     * @return void
     */
    public function store()
    {
        // Validation
        $this->validate();

        $data = [
            'name' => $this->name,
            'slug_name' => slug($this->name),
            'is_featured' => $this->is_featured,
            'hot_topic' => $this->hot_topic,
        ];

        if ($this->mode == 'create') {
            Tag::create($data);

            // Reset all props
            $this->reset();

            $featured = (new TagQuery())->getFeaturedTags(8);
            Cache::forget('tags');
            Cache::forever('tags', $featured);

            // Flash message
            return session()->flash('success', 'Tag berhasil ditambahkan.');
        } else {
            $tag = Tag::find($this->tagId);
            $tag->update($data);

            // Reset all props
            $this->reset();

            $featured = (new TagQuery())->getFeaturedTags(8);
            Cache::forget('tags');
            Cache::forever('tags', $featured);

            // Flash message
            return session()->flash('success', 'Tag berhasil diperbarui.');
        }
    }

    /**
     * Get all tags from database
     *
     * @return void
     */
    public function getAllTags()
    {
        return (new TagQuery())->filters((object) [
            'sort' => $this->sort,
            'order' => $this->order,
            'search' => $this->search,
        ], $this->perPage);
    }

    /**
     * Destroy tag from database
     *
     * @return void
     */
    public function destroy()
    {
        $tag = Tag::where('id', $this->destroyId)->first();

        $featured = (new TagQuery())->getFeaturedTags('posts.berita', 8);
        Cache::forget('tags');
        Cache::forever('tags', $featured);

        // Force delete
        $tag->forceDelete();
        return session()->flash('success', 'Tag berhasil dihapus.');
    }

    public function render()
    {
        return view('post::livewire.tag.all', [
            'tags' => $this->getAllTags(),
        ]);
    }
}