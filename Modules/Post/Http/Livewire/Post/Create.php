<?php

namespace Modules\Post\Http\Livewire\Post;

use App\Contracts\WithEditor;
use App\Contracts\WithImageFilepond;
use App\Contracts\WithTagifyList;
use App\Http\Livewire\Editor;
use App\Http\Livewire\Filepond\Image;
use App\Http\Livewire\TagifyList;
use App\Services\PostService;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Master\Entities\Category;
use Modules\Master\Entities\SubCategory;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\PostType;
use Modules\Post\Entities\Tag;
use Modules\Post\Services\PostType\PostTypeQuery;

class Create extends Component
{
    use WithEditor, WithImageFilepond, WithTagifyList;

    /**
     * Define form props
     *
     * @var array
     */
    public $thumbnail, $thumbnail_source, $category, $sub_category, $type, $tags, $status, $allowed_column = [],
    $title, $slug_title, $subject, $description;

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        Editor::EVENT_VALUE_UPDATED,
        Image::EVENT_VALUE_UPDATED,
        TagifyList::EVENT_VALUE_UPDATED,
    ];

    public function mount($slug_type)
    {
        if ($slug_type) {
            $type = (new PostTypeQuery())->findBySlug($slug_type);
            $this->type = $type ? $type->id : null;
            $this->allowed_column = json_decode($type->allow_column);
        }

        $this->getSubCategories();
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
            'thumbnail_source' => 'required|max:191',
            'type' => 'required|max:191',
            'category' => 'nullable',
            'sub_category' => 'nullable',
            'title' => 'required|max:191|unique:posts,title',
            'slug_title' => 'required|max:191|unique:posts,slug_title',
            'tags' => 'nullable|max:191',
            'subject' => 'nullable|max:191',
            'description' => 'nullable',
            'status' => 'required',
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
            'tags.max' => 'The tags has reached its maximum point.',
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

        $this->resetTagifyList();

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
        if ($type) {
            $this->allowed_column = json_decode($type->allow_column);

            if (in_array('subject', $this->allowed_column)) {
                $this->validate([
                    'subject' => 'required',
                ]);
            }

            if (in_array('category', $this->allowed_column)) {
                $this->validate([
                    'category' => 'required',
                ]);
            }

            if (in_array('tags', $this->allowed_column)) {
                $this->validate([
                    'tags' => 'required',
                ]);
            }
        }
    }

    /**
     * Hooks for type property
     * Doing type validation after
     * Type property has been updated
     *
     * @param  string $value
     * @return void
     */
    public function updatedCategory($value)
    {
        $this->reset('sub_category');
    }

    public function getSubCategories()
    {
        return SubCategory::where('category_id', $this->category)->get();
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
            'sub_category_id' => $this->sub_category ?: null,
            'type_id' => $this->type,
            'subject' => $this->subject,
            'description' => $this->description,
            'tags' => $this->tags,
            'reading_time' => $this->description ? PostService::generateReadingTime($this->description) : '0 Menit',
            'number_of_views' => 0,
            'number_of_shares' => 0,
            'author' => user('id'),
            'thumbnail_source' => $this->thumbnail_source,
        ];

        // status
        if ($this->status == 'draft') {
            $data['published_at'] = null;
            $data['archived_at'] = null;
        } else if ($this->status == 'published') {
            $data['published_by'] = user('id');
            $data['published_at'] = now()->toDateTimeString();
            $data['archived_at'] = null;
        } else if ($this->status == 'archived') {
            $data['published_at'] = null;
            $data['archived_at'] = now()->toDateTimeString();
        }

        if ($this->thumbnail) {
            $data['thumbnail'] = $this->thumbnail;
        }

        // Create Post
        Post::create($data);

        // Reset props
        $this->reset(
            'thumbnail',
            'thumbnail_source',
            'title',
            'slug_title',
            'category',
            'sub_category',
            'subject',
            'description',
            'tags',
            'status'
        );

        // Emit to editor editor, reset text ditor
        $this->resetEditor();
        $this->resetImageFilepond();
        $this->resetTagifyList();
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
     * When editor editor has been updated,
     * Description property will be update
     *
     * @param  string $value
     * @return void
     */
    public function editor_value_updated($value)
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
    public function images_value_updated($value)
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
    public function tagify_list_value_updated($value, $list = null)
    {
        $this->tags = $value;
    }

    public function render()
    {
        return view('post::livewire.post.create', [
            'types' => PostType::get(['id', 'name']),
            'categories' => $this->getCategories(),
            'sub_categories' => $this->getSubCategories(),
            'tagsList' => Tag::orderBy('name')->get()->pluck('name'),
        ]);
    }
}
