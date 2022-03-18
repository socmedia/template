<?php

namespace Modules\Post\Http\Livewire\Post;

use App\Contracts\WithImageUpload;
use App\Contracts\WithTrix;
use App\Http\Livewire\ImageUpload;
use App\Http\Livewire\Trix;
use App\Services\PostService;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Master\Entities\Category;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\PostType;

class Create extends Component
{
    use WithTrix, WithImageUpload;

    /**
     * Define form props
     *
     * @var array
     */
    public $thumbnail, $category, $type, $tags = [], $publish = 1,
    $tagsInString, $tag, $title, $slug_title, $subject, $description;

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        Trix::EVENT_VALUE_UPDATED,
        ImageUpload::EVENT_VALUE_UPDATED,
    ];

    /**
     * Define validation rules
     *
     * @return void
     */
    protected function rules()
    {
        return [
            'thumbnail' => 'required',
            'category' => 'required',
            'title' => 'required|max:191|unique:posts,title',
            'slug_title' => 'required|max:191|unique:posts,slug_title',
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
        // Validation
        $this->validate();

        $data = [
            'id' => Str::random(32),
            'title' => $this->title,
            'slug_title' => $this->slug_title,
            'category_id' => $this->category,
            'type_id' => $this->type,
            'subject' => $this->subject,
            'description' => $this->description,
            'tags' => $this->tagsInString,
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
            'categories' => Category::where('table_reference', 'posts')->get(),
            'types' => PostType::get(['id', 'name']),
        ]);
    }
}