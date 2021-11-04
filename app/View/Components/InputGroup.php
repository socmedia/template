<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputGroup extends Component
{
    public $inputType, $withIcon, $text;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($inputType = 'prepend', $withIcon = 'false', $icon = false, $text = '')
    {
        $this->inputType = $inputType;
        $this->withIcon = $withIcon;
        $this->icon = $icon;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-group');
    }
}