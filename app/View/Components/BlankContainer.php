<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BlankContainer extends Component
{
    public $xs, $sm, $md, $lg, $additionalClass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($xs = 12, $sm = 12, $md = 12, $lg = 12, $additionalClass = null)
    {
        $this->xs = $xs;
        $this->sm = $sm;
        $this->md = $md;
        $this->lg = $lg;
        $this->additionalClass = $additionalClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blank-container');
    }
}