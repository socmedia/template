<?php

namespace Modules\Post\Http\Livewire\Post;

use App\Http\Livewire\Trix;
use App\Services\ImageService;
use App\Services\PostService;
use App\Utillities\Generate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\PostCategory;
use Modules\Post\Entities\PostMedia;
use Modules\Post\Entities\PostStatus;

class Create extends Component
{
    use WithFileUploads;

    /**
     * Define form props
     *
     * @var array
     */
    public $thumbnail, $category, $tags = [], $tagsInString, $tag, $status, $title, $slug_title, $subject, $description;

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        Trix::EVENT_VALUE_UPDATED,
    ];

    /**
     * Define validation rules
     *
     * @return void
     */
    protected function rules()
    {
        $status = PostStatus::all(['slug_name'])->pluck('slug_name')->toArray();

        return [
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg|max:512',
            'category' => 'required',
            'title' => 'required|max:191|unique:posts,title',
            'slug_title' => 'required|max:191|unique:posts,slug_title',
            'status' => 'in:' . implode(',', $status),
            'tagsInString' => 'nullable|max:191',
            'subject' => 'required|max:191',
            'description' => 'required',
        ];
    }

    /**
     * Define validation message
     *
     * @return void
     */
    protected function messages()
    {
        return [
            'tagsInString.max' => 'The tags has reached its maximum point.',
            'description.required' => 'The content field is required.',
        ];
    }

    /**
     * Hooks for description property
     * When trix editor has been updated,
     * Description property will be update
     *
     * @param  string $value
     * @return void
     */
    public function trix_value_updated($value)
    {
        $this->description = $value;
    }

    /**
     * Hooks for thumbnail property
     * Doing thumbnail validation after
     * Thumbnail property has been updated
     *
     * @return void
     */
    public function updatedThumbnail()
    {
        $this->validate([
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg|max:512',
        ]);
    }

    /**
     * Hooks for title property
     * Doing title validation after
     * Title property has been updated
     *
     * @param  string $value
     * @return void
     */
    public function updatedTitle($value)
    {
        $this->slug_title = slug($value);

        $this->validate([
            'title' => 'required|max:191|unique:posts,title',
            'slug_title' => 'required|max:191|unique:posts,slug_title',
        ]);
    }

    /**
     * Hooks for slug_title property
     * Doing slug_title validation after
     * Slug_title property has been updated
     *
     * @param  string $value
     * @return void
     */
    public function updatedSlugTitle($value)
    {
        $this->validate([
            'slug_title' => 'required|max:191|unique:posts,slug_title',
        ]);
    }

    /**
     * Store post method
     *
     * @return void
     */
    public function store()
    {
        // Define variables
        $status = PostStatus::where('slug_name', $this->status)->first();
        $imageService = new ImageService();

        // Check if status is not exist
        if (!$status) {
            return session()->flash('failed', 'Status postingan tidak tersedia.');
        }

        // Validation
        $this->validate();

        // Create Post
        $post = Post::create([
            'id' => Generate::ID(),
            'title' => $this->title,
            'slug_title' => $this->slug_title,
            'category_id' => $this->category,
            'status_id' => $status->id,
            'taype_id' => 1,
            'subject' => $this->subject,
            'description' => $this->description,
            'tags' => $this->tagsInString,
            'reading_time' => $this->description ? PostService::generateReadingTime($this->description) : '0 Menit',
            'number_of_views' => 0,
            'number_of_shares' => 0,
            'author' => user('id'),
        ]);

        // Create Thumbnail
        PostMedia::create([
            'posts_id' => $post->id,
            'type' => 'thumbnail',
            'media_type' => 'image',
            'media_path' => url($imageService->storeImage($this->thumbnail)),
        ]);

        // Reset props
        $this->reset(
            'thumbnail',
            'title',
            'slug_title',
            'category',
            'subject',
            'description',
            'tags',
            'tagsInString',
            'tag'
        );

        // Emit to trix editor, reset text ditor
        $this->emitTo('trix', 'reset_trix');
        session()->flash('success', 'Postingan berhasil ditambahkan.');
    }

    /**
     * Add tag to tags property
     *
     * @return void
     */
    public function addTag()
    {
        // Check if tag already exist in tags property
        if (in_array($this->tag, $this->tags)) {
            return $this->addError('tagsInString', 'Tag has been choosen.');
        } else {
            $this->resetErrorBag('tagsInString');
        }

        // Check if tag is not null
        if ($this->tag) {
            array_push($this->tags, $this->tag); // push to tags prop
            $this->tagsInString = implode(',', $this->tags); // array to string
            $this->reset('tag');
        }
    }

    /**
     * Remove tag from tags property
     * Unset by array index
     *
     * @param  mixed $index
     * @return void
     */
    public function removeTag($index)
    {
        // Check if index is exsist in tags prop
        if (array_key_exists($index, $this->tags)) {
            unset($this->tags[$index]);
            $this->tagsInString = implode(',', $this->tags);
        }
    }

    public function render()
    {
        return view('post::livewire.post.create', [
            'categories' => PostCategory::all(['id', 'name']),
            'statuses' => PostStatus::all(),
        ]);
    }
}