<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;

class Tagify extends Component
{
    const EVENT_VALUE_UPDATED = 'tagify_value_updated';

    public $component_id;
    public $value;

    public function mount($value = '')
    {
        $this->component_id = 'tagify-' . Str::random(5);
        $this->value = $value;
    }

    protected $listeners = [
        'reset_tagify' => 'resetTagify',
    ];

    public function updatedValue($value)
    {
        $this->emit(self::EVENT_VALUE_UPDATED, $value);
    }

    public function resetTagify()
    {
        $this->reset('value');
        $this->dispatchBrowserEvent('reset_tagify', [
            'target' => $this->component_id,
            'input' => 'input#' . $this->component_id,
        ]);
    }

    public function render()
    {
        return view('livewire.tagify');
    }
}
