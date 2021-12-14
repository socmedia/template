<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Header extends Component
{
    public $cells;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cells  = [])
    {
        $this->cells = $cells;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.header');
    }
}