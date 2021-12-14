<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $state, $color, $icon, $title, $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($state, $color, $icon = null, $title, $message = null)
    {
        $this->state = $state;
        $this->color = $color;
        $this->icon = $icon;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}