<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class Back extends Component
{
    public $href;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href = 'javascript:void(0)')
    {
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button.back');
    }
}