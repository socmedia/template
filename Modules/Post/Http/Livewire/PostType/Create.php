<?php

namespace Modules\Post\Http\Livewire\PostType;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\PostType;

class Create extends Component
{

    /**
     * Define livewire wire:model
     *
     * @var mixed
     */
    public $name, $slug_name, $columns, $all_column, $allowed_column = [];

    /**
     * Define validation rules
     *
     * @return void
     */
    protected function rules()
    {
        return [
            'name' => 'required|max:191|unique:post_types,name',
            'slug_name' => 'required|max:191|unique:post_types,slug_name',
        ];
    }

    /**
     * Define prop before component rendered
     *
     * @return void
     */
    public function mount()
    {
        $columns = (new Post())->form;
        $this->columns = $columns;

        foreach ($columns as $i => $column) {
            if ($column == 'required') {
                array_push($this->allowed_column, $i);
            } else {
                array_push($this->allowed_column, null);
            }
        }
    }

    /**
     * Hooks for all properties
     *
     * @param  string $value
     * @param  string $value
     * @return void
     */
    public function updated($column, $value)
    {
        if ($column == 'all_column' && $value == 'all') {
            $this->allowed_column = array_keys($this->columns);
        }

        if (Str::contains($column, 'allowed_column')) {

            $columns = $this->columns;
            $allowed_column = $this->allowed_column;
            $columnKeys = array_keys($columns);

            if (count(array_diff($allowed_column, $columnKeys)) > 0) {
                $this->reset('all_column');
            } elseif (count(array_diff($allowed_column, $columnKeys)) == 0) {
                $this->all_column = true;
            }
        }

        if ($column == 'name') {
            $this->slug_name = slug($value);
        }
    }

    /**
     * Store post_type to database
     *
     * @return void
     */
    public function store()
    {
        // Validation
        $this->validate();

        $data = [
            'name' => $this->name,
            'slug_name' => $this->slug_name,
            'allow_column' => [],
        ];

        foreach ($this->allowed_column as $i => $column) {
            if ($column) {
                array_push($data['allow_column'], $column);
            }
        }

        $data['allow_column'] = json_encode($data['allow_column']);

        // Create Categories
        PostType::create($data);

        Cache::forget('post_types');

        // Reset all props
        $this->reset('name', 'slug_name');

        $columns = (new Post())->form;

        foreach ($columns as $i => $column) {
            if ($column == 'required') {
                array_push($this->allowed_column, $i);
            } else {
                array_push($this->allowed_column, null);
            }
        }

        $types = PostType::all(['name', 'slug_name']);
        Cache::forever('post_types', $types);

        // Flash message
        session()->flash('success', 'Jenis postingan berhasil ditambahkan.');
    }

    public function render()
    {
        return view('post::livewire.post-type.create');
    }
}