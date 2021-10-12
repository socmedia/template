<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AlertBorder extends Component
{
    public $state, $icon, $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($state, $icon = null, $title)
    {
        $this->state = $state;
        $this->icon = $icon;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert-border');
    }
}