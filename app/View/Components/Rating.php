<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Rating extends Component
{
    public $count, $average;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($count, $average)
    {
        $this->count = $count;
        $this->average = $average;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.rating');
    }
}