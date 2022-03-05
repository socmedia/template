<?php

namespace App\View\Components\Guest\Search;

use Illuminate\View\Component;

class Place extends Component
{
    public $places;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($places)
    {
        $this->places = $places;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.guest.search.place');
    }
}