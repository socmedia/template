<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class Trash extends Component
{
    public $href, $totalTrash;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href = 'javascript:void(0)', $totalTrash = null)
    {
        $this->href = $href;
        $this->totalTrash = $totalTrash;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button.trash');
    }
}