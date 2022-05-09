<?php

namespace Modules\Post\Http\Livewire\PostType;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\PostType;

class Edit extends Component
{
    /**
     * Define livewire wire:model
     *
     * @var mixed
     */
    public $type, $name, $slug_name, $columns, $all_column, $allowed_column = [];

    /**
     * Define prop before component rendered
     *
     * @return void
     */
    public function mount($type)
    {

        $columns = (new Post())->form;
        $this->columns = $columns;

        $this->type = $type;
        $this->name = $type->name;
        $this->slug_name = $type->slug_name;
        $typeColumn = json_decode($type->allow_column);

        if (is_array($typeColumn)) {
            foreach (array_keys($columns) as $i => $column) {
                if (in_array($column, $typeColumn)) {
                    array_push($this->allowed_column, $column);
                } else {
                    array_push($this->allowed_column, null);
                }
            }
        } else {
            foreach ($columns as $i => $column) {
                if ($column == 'required') {
                    array_push($this->allowed_column, $column);
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
            'name' => 'required|max:191',
            'slug_name' => 'required|max:191',
        ];
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
    public function update()
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
        $type = PostType::find($this->type->id);
        $type->update($data);

        Cache::forget('post_types');

        $types = PostType::all(['name', 'slug_name']);
        Cache::forever('post_types', $types);

        // Flash message
        session()->flash('success', 'Jenis postingan berhasil diperbarui.');
    }

    public function render()
    {
        return view('post::livewire.post-type.edit');
    }
}