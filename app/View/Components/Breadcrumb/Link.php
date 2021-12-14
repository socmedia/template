<?php

namespace App\View\Components\Breadcrumb;

use Illuminate\View\Component;

class Link extends Component
{
    public $active, $pageTitle, $href, $isParent;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($active = false, $pageTitle = null, $href = null, $isParent = false)
    {
        $this->pageTitle = $pageTitle;
        $this->href = $href;
        $this->isParent = $isParent;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.breadcrumb.link');
    }
}