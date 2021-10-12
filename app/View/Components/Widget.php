<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Widget extends Component
{
    public $state, $text, $title, $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($state, $text, $title, $icon = null)
    {
        $this->state = $state;
        $this->text = $text;
        $this->title = $title;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.widget');
    }
}