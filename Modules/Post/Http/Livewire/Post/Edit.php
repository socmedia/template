<?php

namespace Modules\Post\Http\Livewire\Post;

use App\Contracts\WithEditor;
use App\Contracts\WithImageFilepond;
use App\Contracts\WithTagify;
use App\Http\Livewire\Editor;
use App\Http\Livewire\Filepond\Image;
use App\Http\Livewire\Tagify;
use App\Services\ImageService;
use App\Services\PostService;
use Livewire\Component;
use Modules\Master\Entities\Category;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\PostType;

class Edit extends Component
{
    use WithEditor, WithImageFilepond, WithTagify;

    /**
     * Define form props
     *
     * @var array
     */
    public $thumbnail, $category, $type, $tags, $publish, $allowed_column = [],
    $title, $slug_title, $subject, $description;

    public $post, $oldThumbnail;

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        Editor::EVENT_VALUE_UPDATED,
        Image::EVENT_VALUE_UPDATED,
        Tagify::EVENT_VALUE_UPDATED,
    ];

    public function mount($post)
    {
        $this->post = $post;
        $this->category = $post->category_id;
        $this->type = $post->type_id;
        $this->tags = $post->tags;
        $this->title = $post->title;
        $this->slug_title = $post->slug_title;
        $this->subject = $post->subject;
        $this->description = $post->description;
        $this->publish = $post->published_at ? 1 : 0;
        $this->oldThumbnail = $post->thumbnail ?: cache('image_not_found');

        $type = PostType::find($post->type_id);

        if ($type) {
            $this->allowed_column = json_decode($type->allow_column);
        } else {
            $columns = (new Post())->form;
            foreach ($columns as $i => $column) {
                if ($column == 'required') {
                    array_push($this->allowed_column, $i);
                } else {
                    array_push($this->allowed_column, null);
                }
            }
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
            'thumbnail' => 'nullable',
            'category' => 'nullable',
            'title' => 'required|max:191|unique:posts,title,' . $this->post->id . ',id',
            'slug_title' => 'required|max:191|unique:posts,slug_title,' . $this->post->id . ',id',
            'tags' => 'nullable|max:191',
            'subject' => 'nullable|max:191',
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
            'tags.max' => 'The tags has reached its maximum point.',
            'description.required' => 'The content field is required.',
        ];
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
    public function tagify_value_updated($value)
    {
        $this->tags = $value;
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
    public function update()
    {
        // Validation
        $this->validate();

        $service = new ImageService();

        $data = [
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
            $path = explode('/', $this->oldThumbnail);
            $shortPath = implode('/', array_slice($path, -2, 2));
            $service->removeImage('images', $shortPath);
            $data['thumbnail'] = $this->thumbnail;
        }

        $post = Post::find($this->post->id);
        $post->update($data);

        session()->flash('success', 'Postingan berhasil diperbarui.');
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

    public function render()
    {
        return view('post::livewire.post.edit', [
            'categories' => $this->getCategories(),
            'types' => PostType::get(['id', 'name']),
        ]);
    }
}