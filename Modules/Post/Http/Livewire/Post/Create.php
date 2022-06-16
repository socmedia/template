<?php

namespace Modules\Post\Http\Livewire\Post;

use App\Contracts\WithImageUpload;
use App\Contracts\WithTagify;
use App\Contracts\WithTrix;
use App\Http\Livewire\ImageUpload;
use App\Http\Livewire\Tagify;
use App\Http\Livewire\Trix;
use App\Services\PostService;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Master\Entities\Category;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\PostType;
use Modules\Post\Services\PostType\PostTypeQuery;

class Create extends Component
{
    use WithTrix, WithImageUpload, WithTagify;

    /**
     * Define form props
     *
     * @var array
     */
    public $thumbnail, $category, $type, $tags, $publish = 1, $allowed_column = [],
    $title, $slug_title, $subject, $description;

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        Trix::EVENT_VALUE_UPDATED,
        ImageUpload::EVENT_VALUE_UPDATED,
        Tagify::EVENT_VALUE_UPDATED,
    ];

    public function mount($slug_type)
    {
        if ($slug_type) {
            $type = (new PostTypeQuery())->findBySlug($slug_type);
            $this->type = $type ? $type->id : null;
            $this->allowed_column = json_decode($type->allow_column);
        }

    }

    /**
     * Define validation rules
     *
     * @return void
     */
    protected function rules()
    {
        return [
            'thumbnail' => 'required',
            'type' => 'required|max:191',
            'category' => 'nullable',
            'title' => 'required|max:191|unique:posts,title',
            'slug_title' => 'required|max:191|unique:posts,slug_title',
            'tagsInString' => 'nullable|max:191',
            'subject' => 'nullable|max:191',
            'description' => 'nullable',
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
     * Hooks for title property
     * Doing title validation after
     * Title property has been updated
     *
     * @param  string $value
     * @return void
     */
    public function updatedTitle($value)
    {

        $this->resetTagify();

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
     * Hooks for type property
     * Doing type validation after
     * Type property has been updated
     *
     * @param  string $value
     * @return void
     */
    public function updatedType($value)
    {
        $type = PostType::find($value);
        $this->allowed_column = json_decode($type->allow_column);
    }

    /**
     * Store post method
     *
     * @return void
     */
    public function store()
    {
        // Validation
        $this->validate();

        $data = [
            'id' => Str::random(12),
            'title' => $this->title,
            'slug_title' => $this->slug_title,
            'category_id' => $this->category,
            'type_id' => $this->type,
            'subject' => $this->subject,
            'description' => $this->description,
            'tags' => $this->tags,
            'reading_time' => $this->description ? PostService::generateReadingTime($this->description) : '0 Menit',
            'published_at' => $this->publish ? now()->toDateTimeString() : null,
            'archived_at' => null,
            'number_of_views' => 0,
            'number_of_shares' => 0,
            'author' => user('id'),
        ];

        if ($this->thumbnail) {
            $data['thumbnail'] = $this->thumbnail;
        }

        // Create Post
        Post::create($data);

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
        $this->resetTrix();
        $this->resetImageUpload();
        $this->resetTagify();
        session()->flash('success', 'Postingan berhasil ditambahkan.');
    }

    /**
     * Get all categories and filter by post type
     *
     * @return void
     */
    public function getCategories()
    {
        $type = PostType::find($this->type);

        if ($this->type) {
            $categories = Category::where('table_reference', 'like', '%posts.' . $type->slug_name . '%')->get();
        } else {
            $categories = Category::where('table_reference', 'like', '%posts%')->get();
        }

        return $categories;
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
     * When image-upload has been updated,
     * Thumbnail property will be update
     *
     * @param  string $value
     * @return void
     */
    public function image_uploaded($value)
    {
        $this->thumbnail = $value;
    }

    /**
     * Hooks for tags property
     * When tags has been updated,
     * Tags property will be update
     *
     * @param  string $value
     * @return void
     */
    public function tagify_value_updated($value)
    {
        $this->tags = $value;
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
            'types' => PostType::get(['id', 'name']),
            'categories' => $this->getCategories(),
        ]);
    }
}
