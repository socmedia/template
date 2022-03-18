<?php

namespace Modules\Post\Http\Livewire\Post;

use App\Services\ImageService;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Master\Entities\Category;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\PostType;
use Modules\Post\Services\PostQuery;
use Modules\Post\Services\TableConfig;
use Modules\Post\Services\TableFilterActions;

class Table extends Component
{
    use WithPagination, TableConfig, TableFilterActions;

    /**
     * Define query string props
     *
     * @var string
     */
    public $filters, $category, $type, $status, $sort, $order, $search, $destroyId;

    /**
     * Define sorts property
     *
     * @var array
     */
    public $sorts = [
        [
            'label' => 'Judul',
            'column' => 'title',
        ],
        [
            'label' => 'Publish Pada',
            'column' => 'created_at',
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
        'category',
        'type',
        'status',
        'sort',
        'order',
        'search',
    ];

    /**
     * Get all posts from database
     *
     * @return void
     */
    public function getAllPosts()
    {
        $post = new PostQuery();
        return $post->filters((object) [
            'category' => $this->category,
            'type' => $this->type,
            'status' => $this->status,
            'sort' => $this->sort,
            'order' => $this->order,
            'search' => $this->search,
        ]);
    }

    /**
     * Change post status bocome archive or publish
     *
     * @param  mixed $id
     * @return void
     */
    public function archive($id)
    {
        $post = Post::find($id);

        // Check if post and status not null
        if ($post) {

            $post->update([
                'published_at' => null,
                'archived_at' => now()->toDateTimeString(),
            ]);

            return session()->flash('success', 'Postingan berhasil dipublish.');
        }

        return session()->flash('failed', 'Postingan tidak ditemukan, pengarsipan gagal.');
    }

    /**
     * Destroy post from database
     *
     * @return void
     */
    public function destroy()
    {
        $post = Post::where('id', $this->destroyId)->withTrashed()->first();
        $service = new ImageService();

        // Check if post have a thumbnail
        if ($post->thumbnail) {

            // Remove existing thumbnail
            $path = explode('/', $post->thumbnail->media_path);
            $shortPath = implode('/', array_slice($path, -2, 2));
            $service->removeImage('images', $shortPath);
        }

        // Force delete
        $post->forceDelete();
        return session()->flash('success', 'Postingan berhasil dihapus.');
    }

    public function render()
    {
        return view('post::livewire.post.table', [
            'posts' => $this->getAllPosts(),
            'categories' => Category::where('table_reference', 'posts')->get(),
            'types' => PostType::all('name', 'slug_name'),
            'statuses' => [
                [
                    'name' => 'Draft',
                    'slug_name' => slug('Draft'),
                ],
                [
                    'name' => 'Publish',
                    'slug_name' => slug('Publish'),
                ],
                [
                    'name' => 'Archived',
                    'slug_name' => slug('Archived'),
                ],
            ],
        ]);
    }
}