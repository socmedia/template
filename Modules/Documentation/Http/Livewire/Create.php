<?php

namespace Modules\Documentation\Http\Livewire;

use App\Contracts\WithTrix;
use App\Http\Livewire\Trix;
use App\Utillities\Generate;
use Livewire\Component;
use Modules\Documentation\Entities\Documentation;
use Modules\Documentation\Services\DocumentationQuery;

class Create extends Component
{
    use WithTrix;

    /**
     * Define form props in this component
     *
     * @var mixed
     */
    public $is_child, $page_title, $slug_page_title, $position, $parent, $content, $publish = 1;
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
        Trix::EVENT_VALUE_UPDATED,
    ];

    /**
     * Define props before component rendered
     *
     * @return void
     */
    public function mount()
    {
        // Get sub_documentations names
        $sub_documentations = (new DocumentationQuery())->getParents();
        $pluckSubDocumentation = array_map(function ($docs) {
            return $docs['id'];
        }, $sub_documentations->toArray());

        $this->sub_documentations = $sub_documentations;
        $this->pluckSubDocumentation = implode(',', $pluckSubDocumentation);
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
     * When trix editor has been updated,
     * Description property will be update
     *
     * @param  string $value
     * @return void
     */
    public function trix_value_updated($value)
    {
        $this->content = $value;
    }

    /**
     * Store new sub_documentation to database
     *
     * @return void
     */
    public function store()
    {

        $rules = $this->rules();

        // Validation
        $this->validate($rules);

        $parentLastPosition = (new DocumentationQuery())->getParentLastPosition((object) [
            'parent' => $this->parent,
        ]);

        $childLastPosition = (new DocumentationQuery())->getChildLastPosition((object) [
            'parent' => $this->parent,
        ]);

        $data = [
            'id' => Generate::ID(32),
            'page_title' => $this->page_title,
            'slug_page_title' => $this->slug_page_title,
            'content' => $this->content,
            'published_at' => $this->publish ? now()->toDateTimeString() : null,
        ];

        if ($this->is_child) {
            $data['position'] = $childLastPosition ? $childLastPosition->position + 1 : 1;
            $data['parent_id'] = $this->parent;
        } else {
            $data['position'] = $parentLastPosition ? $parentLastPosition->position + 1 : 1;
            $data['parent_id'] = null;
        }

        // dd($data);
        // Create new sub_documentation
        Documentation::create($data);

        // Reset all props
        $this->resetTrix();
        $this->reset(
            'page_title',
            'slug_page_title',
            'parent',
        );

        // Flash message
        session()->flash('success', 'Dokumentasi berhasil ditambahkan.');
    }

    public function render()
    {
        return view('documentation::livewire.create');
    }
}
