<?php

namespace Modules\Post\Http\Livewire\Post;

use App\Services\ImageService;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\PostCategory;
use Modules\Post\Entities\PostStatus;
use Modules\Post\Entities\PostType;
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
        $posts = Post::filters([
            'category' => $this->category,
            'type' => $this->type,
            'status' => $this->status,
            'sort' => $this->sort,
            'order' => $this->order,
            'search' => $this->search,
        ]);

        return $posts->paginate(12);
    }

    /**
     * Change post status bocome archive or publish
     *
     * @param  mixed $id
     * @return void
     */
    public function archive($id)
    {
        $status = PostStatus::where('slug_name', 'archive')->first();
        $post = Post::find($id);

        // Check if post and status not null
        if ($post && $status) {

            // If post status is archive, status will change become published
            if ($post->status_id == $status->id) {

                $publish = PostStatus::where('slug_name', 'published')->first();
                $post->update([
                    'status_id' => $publish ? $publish->id : $post->status_id,
                ]);
                return session()->flash('success', 'Postingan berhasil dipublish.');

                // Change post status become archive
            } else {

                $post->update([
                    'status_id' => $status ? $status->id : $post->status_id,
                ]);
                return session()->flash('success', 'Postingan berhasil diarsipkan.');

            }

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
            'categories' => PostCategory::all('name', 'slug_name'),
            'types' => PostType::all('name', 'slug_name'),
            'statuses' => PostStatus::all('name', 'slug_name'),
        ]);
    }
}
