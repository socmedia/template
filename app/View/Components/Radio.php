<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Radio extends Component
{
    public $name, $id, $value, $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $id, $value = null, $label = null)
    {
        $this->name = $name;
        $this->id = $id;
        $this->value = $value;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.radio');
    }
}