<?php

namespace Modules\Documentation\Http\Livewire;

use App\Contracts\WithEditor;
use App\Http\Livewire\Editor;
use Livewire\Component;
use Modules\Documentation\Entities\Documentation;
use Modules\Documentation\Services\DocumentationQuery;

class Edit extends Component
{
    use WithEditor;

    /**
     * Define form props in this component
     *
     * @var mixed
     */
    public $documentation, $is_child, $page_title, $slug_page_title, $position, $parent, $content;
    /**
     * Define data props
     *
     * @var array
     */
    public $sub_documentations, $pluckSubDocumentation = [];

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        Editor::EVENT_VALUE_UPDATED,
    ];

    /**
     * Define props before component rendered
     *
     * @return void
     */
    public function mount($documentation)
    {
        $this->documentation = $documentation;

        // Get sub_documentations names
        $sub_documentations = (new DocumentationQuery())->getParents();
        $pluckSubDocumentation = array_map(function ($docs) {
            return $docs['id'];
        }, $sub_documentations->toArray());

        $this->sub_documentations = $sub_documentations;
        $this->pluckSubDocumentation = implode(',', $pluckSubDocumentation);

        $this->is_child = $documentation->parent ? 1 : 0;
        $this->page_title = $documentation->page_title;
        $this->slug_page_title = $documentation->slug_page_title;
        $this->content = $documentation->content;
        $this->publish = $documentation->published_at ? 1 : 0;
        $this->parent = $documentation->parent_id;
        $this->position = $documentation->position;
    }

    /**
     * Form validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'page_title' => 'required|max:191',
            'slug_page_title' => 'required|max:191',
        ];
    }

    public function updated($component, $value)
    {
        if ($component == 'page_title') {
            $this->slug_page_title = slug($value);
        }

        if ($component == 'is_child') {
            $this->validate([
                'parent' => 'required|in:' . $this->pluckSubDocumentation,
            ]);
        }
    }

    /**
     * Hooks for content property
     * When editor editor has been updated,
     * Description property will be update
     *
     * @param  string $value
     * @return void
     */
    public function editor_value_updated($value)
    {
        $this->content = $value;
    }

    /**
     * Update documentation to database
     *
     * @return void
     */
    public function update()
    {

        $rules = $this->rules();

        // Validation
        $this->validate($rules);

        $data = [
            'page_title' => $this->page_title,
            'slug_page_title' => $this->slug_page_title,
            'content' => $this->content,
            'published_at' => $this->publish ? now()->toDateTimeString() : null,
        ];

        if ($this->is_child) {
            $data['parent_id'] = $this->parent;
        } else {
            $data['parent_id'] = null;
        }
        // Create new sub_documentation
        // Documentation::create($data);
        // Update Documentation
        // $documentation = Documentation::find($this->documentation->id);
        $this->documentation->update($data);

        // Flash message
        session()->flash('success', 'Dokumentasi berhasil diperbarui.');
    }

    public function render()
    {
        return view('documentation::livewire.edit');
    }
}