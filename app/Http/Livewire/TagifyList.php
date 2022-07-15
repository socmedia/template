<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;

class TagifyList extends Component
{
    const EVENT_VALUE_UPDATED = 'tagify_list_value_updated';

    public $component_id;
    public $value;
    public $tagsList;

    public function mount($value = '', $list = '')
    {
        $this->component_id = 'tagify_list-' . Str::random(5);
        $this->value = $value;
        $this->tagsList = $list;
    }

    protected $listeners = [
        'reset_tagify_list' => 'resetTagifyList',
    ];

    public function updatedValue($value)
    {
        $this->emit(self::EVENT_VALUE_UPDATED, $value);
    }

    public function resetTagifyList()
    {
        $this->reset('value');
        $this->dispatchBrowserEvent('reset_tagify_list', [
            'target' => $this->component_id,
            'input' => 'input#' . $this->component_id,
        ]);
    }

    public function render()
    {
        return view('livewire.tagify-list');
    }
}
