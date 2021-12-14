<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Cell extends Component
{
    public $cell, $isHeader, $sortable, $sortableOrder;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cell = '', $isHeader = false, $sortable = false, $sortableOrder = null)
    {
        $this->cell = $cell;
        $this->isHeader = $isHeader;
        $this->sortable = $sortable;
        $this->sortableOrder = $sortableOrder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.cell');
    }
}